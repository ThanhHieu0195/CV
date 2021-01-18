(function($) {
	console.log('Ready');
	let backupData = {};

	let divProcessing = false;
	$(document).on("dblclick", '.js-edit', function() {
		enableEditMode();
	});

	function enableEditMode () {
		if (!divProcessing) {
			$('.js-edit').each((idx, e) => {
				// console.log(e);
				let v = $(e).html();
				let type = $(e).data('type');
				let oid = $(e).data('id');
				$(e).hide();
				let ip = `<input class="js-editing" value="${v.trim()}" data-target="${oid}"/> <span class="js-remove-wrap"> x </span>`;
				if (type === 'textarea') {
					ip = `<textarea rows="5" class="js-editing" data-target="${oid}">${v.trim()}</textarea`;
				}
				$(`<div class="js-wrap-edit">
					${ip}
				</div>`).insertAfter(e);

			});
			$('body').prepend(`<div class="js-wrap-edit text-fix-top">
				<a class="js-save c-btn">save</a> 
				<a class="js-cancel c-btn">cancel</a>
			</div>`);

			$('body').append(`<div class="js-wrap-edit text-fix-bottom">
				<a target="_blank" href="${window.location.href}&action=pdf" class="c-btn">PDF Download</a>
				<a class="c-btn js-download-json">JSON Download</a>
			</div>`);
			$('.js-insert').show();
			backupData = generateData(false);
			divProcessing = true;
		}
	}

	$(document).on('click', '.js-remove-wrap', function() {
		$(this).parents('.js-block-item').remove();
	});

	$('.js-download-json').on('click', function() {
		downloadJson(backupData);
	});

	$(document).on('click', '.js-save', function () {
		console.log('saved');
		let data = generateData();

		console.log(data);
		$.post(window.location.href, {
			action: 'postUpdate',
			postData: data
		}).then(r => {
			$('.js-profile_url').hide();
		});

		let profileElement = $('.js-profile_url');
		const id = $(profileElement).data('id');
		$(`img[data-id=${id}]`).attr('src', $(profileElement).html());
		profileElement.hide();

		divProcessing = false;
	});

	$(document).on('click', '.js-cancel', function () {
		$('.js-wrap-edit').remove();
		$('.js-edit').show();
		$('.js-insert').hide();
		$('.js-profile_url').hide();
		divProcessing = false;
	});

	function downloadJson(jsonData) {
		let code = $('#code').val();
		var dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(jsonData));
		var dlAnchorElem = document.getElementById('downloadAnchorElem');
		dlAnchorElem.setAttribute("href", dataStr);
		dlAnchorElem.setAttribute("download", `${code}-${(new Date()).toISOString()}.json`);
		dlAnchorElem.click();
	}

	$('.js-insert').on('click', function() {
		let v = $(this).parent().find('.js-block-item:last').clone();

		$(v).find('.js-edit').each((idx, e) => {
			console.log(idx, e);
			let newKey = (+new Date());
			$(e).attr('data-id', newKey);
			$(e).parent().find('.js-editing').attr('data-target', newKey);
			console.log('aaa', $(e).parent().find('.js-editing'))
		})
		$(v).insertBefore(this);
	});


	function generateData(isSync = true) {
		let data = {};
		$('.js-editing').each((idx, e) => {
			let v = $(e).val();
			let oid = $(e).data('target');
			let t = $(`span[data-id=${oid}]`);
			if (isSync) {
				$('.js-wrap-edit').remove();
				$('.js-insert').hide();
				$(t).html(v);
				$(t).show();
			}

			let nameElement = $(t).data('name');
			let regex = nameElement ? nameElement.match(/\[([a-z_]+)?\]/g) : null;
			if (regex) {
				let k1 = nameElement.match(/^([a-z_]+)/g)[0];
				if (!data[k1]) data[k1] = {};
				
				const mapData = function(data, keys, value) {
					let key = keys.splice(0, 1)[0];
					key = key.replace(/\[|\]/g, '');

					if (keys.length > 0) {
						if (!data[key]) {
							if (keys.length == 1 && keys[0] == '[]') {
								data[key] = [];
							} else {
								data[key] = {};
							}
						}
						mapData(data[key], keys, value);
					} else {
						if (!key) {
							if (!Array.isArray(data)) data = [];
							data.push(value);
						} else {
							data[key] = value;
						}
					}
				};
				mapData(data[k1], regex, v);

			} else {
				data[nameElement] = v;
			}
			
		});

		return data;
	}
})(jQuery);
