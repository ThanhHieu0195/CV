<div class="col-md-8 detail">
    <div class="session">
        <h3 class="title">
            <i class="fa fa-bullseye" aria-hidden="true" style="padding: 10px 10px"></i>

            <?= get_message('detail.OBJECTIVE') ?></h3>
        <h4 style="line-height: 30px">
        <span class="js-edit" data-type="textarea" data-id="<?= uniqid() ?>" data-name="objective">
            <?= $data['objective'] ?>
        </span>
        </h4>
    </div>
    <?php if( !empty($data['summary']) ): ?>
    <div class="session">
        <h3 class="title-line">
            <i class="fa fa-list" aria-hidden="true" style="padding: 10px 10px"></i>
            <?= get_message('detail.SUMMARY') ?>
        </h3>
        <h4 style="line-height: 30px">
        <span class="js-edit" data-type="textarea" data-id="<?= uniqid() ?>" data-name="summary">
             <?= $data['summary'] ?>
        </span>
        </h4>
    </div>
    <?php endif; ?>

    <div class="session">
        <h3 class="title-line">
            <i class="fa fa-users" aria-hidden="true"></i>
            <?= get_message('detail.WORK_EXPERENCE') ?>
        </h3>

        <div class="row">
            <div class="col-md-12">
                <div class="block-company">
                    <h4 class="item-title"><?= get_message('detail.COMPANY') ?></h4>
                </div>
                <?php 
                    $works = $data['works'];
                    $numItem = count($data['works']['position']);
                    for($i=0; $i < $numItem; $i++):
                    ?>
                <div class="wrap-block js-block-item">
                    <h4>
                        <div class="block-content" style="display: flex;flex-direction: row;">
                            <div class="block-left" style="width: 80%">
                                <div>
                                      <span style="border-bottom: 1px solid #91c190;font-weight: bold;" class="js-edit" data-id="<?= uniqid() ?>" data-name="works[position][]">
                                        <?= $works['position'][$i] ?>
                                    </span>          
                                </div>
                                <br>
                                 <div class="content">
                                      <span class="js-edit" data-type="textarea" data-id="<?= uniqid() ?>" data-name="works[content][]">
                                        <?= $works['content'][$i]     ?>
                                    </span>     
                                </div>
                            </div>

                            <div class="block-right" style="margin-left: 20px;">
                                <div class="text-right" style="font-size: 12px"><strong>
                                    <span class="js-edit" data-id="<?= uniqid() ?>" data-name="works[time][]">
                                        <?= $works['time'][$i] ?>
                                    </span>          
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </h4>
                </div>
                <br>
                <?php endfor;
                ?>
                <a class="js-insert">Insert</a>
            </div>
         
        </div>
        <div class="line"></div>
    </div>
    <p class="quote" style="display: none">
        <i class="fas fa-quote-left"></i>
        To succeed in life, you need two things: ignorance and confidence.<br><span class="author">Mark Twain</span>
    </p>
</div>
