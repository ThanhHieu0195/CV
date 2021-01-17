<div class="col-md-4 profile">
    <div class="block-avt">
        <?php 
        $imgId = uniqid();
        ?>
        <a class="js-profile-click" onclick="$('#<?= $imgId ?>').dblclick();">
            <img data-id="<?= $imgId ?>" class="avt" 
            src="<?= !empty($data['basic_info']['profile_url']) ? $data['basic_info']['profile_url'] : '' ?>" alt=""
            >
        </a>
    </div>
    <span style="display: none!important" id="<?= $imgId ?>" class="js-edit js-profile_url" 
        data-id="<?= $imgId ?>" 
        data-name="basic_info[profile_url]">
        <?= !empty($data['basic_info']['profile_url']) ? $data['basic_info']['profile_url'] : '' ?>
    </span>
    <div class="row">
        <div class="session">
            <ul class="basic-profile">
                <li>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <h4>
                        <span class="js-edit" data-id="<?= uniqid() ?>" data-name="basic_info[phone]">
                            <?= $data['basic_info']['phone'] ?></h4>
                        </span>
                </li>
                <li>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <h4>
                         <span class="js-edit" data-id="<?= uniqid() ?>" data-name="basic_info[email]">
                            <?= $data['basic_info']['email'] ?>
                        </span>
                    </h4>
                </li>
                <li style="position: relative">
                    <i class="fa fa-location-arrow" aria-hidden="true" style="top: 6px;position: absolute;"></i>
                    <h4 style="padding-left: 60px; line-height: 20px">
                         <span class="js-edit" data-id="<?= uniqid() ?>" data-name="basic_info[location]">
                            <?= $data['basic_info']['location'] ?>
                        </span>        
                    </h4>
                </li>
            </ul>
        </div>
        <?php foreach ($data['basic_info']['details'] as $key => $arr): ?>
         <div class="session">
            <h3 class="title-line"><?= $key ?></h3>
            <ul>
                <?php foreach($arr as $text): ?>
                <li class="item-skill">
                    <h4 class="line-height-25">
                         <span class="js-edit" data-id="<?= uniqid() ?>" data-name="basic_info[details][<?= $key ?>][]">
                            <?= $text ?>
                        </span>  
                    </h4>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
    </div>
</div>

<style>
    .item-skill {
        margin-bottom: 15px;
    }
</style>