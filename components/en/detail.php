<div class="col-md-8 detail">
    <div class="session">
        <h3 class="title">Objective</h3>
        <h4 style="line-height: 30px">
        <span class="js-edit" data-type="textarea" data-id="<?= uniqid() ?>" data-name="objective">
            <?= $data['objective'] ?>
        </span>
        </h4>
    </div>

    <div class="session">
        <h3 class="title-line">
            <i class="fa fa-list" aria-hidden="true" style="padding: 10px 10px"></i>
            Summary
        </h3>
        <h4 style="line-height: 30px">
        <span class="js-edit" data-type="textarea" data-id="<?= uniqid() ?>" data-name="summary">
             <?= $data['summary'] ?>
        </span>
        </h4>
    </div>

    <div class="session">
        <h3 class="title-line">
            <i class="fa fa-users" aria-hidden="true"></i>
            Work Experience
        </h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <div class="row">
            <div class="col-md-9">
                <h4 class="item-title">Grab Company Limited</h4>
                <?php 
                    $works = $data['works'];
                    $numItem = count($data['works']['position']);
                    for($i=0; $i < $numItem; $i++):
                    ?>
                <div class="wrap-block js-block-item">
                    <h4>
                        <div class="row">
                            <div class="col-md-8">
                                <div style="border-bottom: 1px solid #91c190;">
                                      <span class="js-edit" data-id="<?= uniqid() ?>" data-name="works[position][]">
                                        <?= $works['position'][$i] ?>
                                    </span>          
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-right" style="font-size: 12px"><strong>
                                    <span class="js-edit" data-id="<?= uniqid() ?>" data-name="works[time][]">
                                        <?= $works['time'][$i] ?>
                                    </span>          
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </h4>
                    <div class="content">
                          <span class="js-edit" data-type="textarea" data-id="<?= uniqid() ?>" data-name="works[content][]">
                            <?= $works['content'][$i]     ?>
                        </span>     
                    </div>

                </div>
                <br>
                <?php endfor;
                ?>
                <a class="js-insert">Insert</a>
            </div>
            <div class="col-md-3">
                <div class="text-right"><strong>08/2017 - 2021</strong></div>
            </div>
        </div>
        <div class="line"></div>
    </div>
    <p class="quote">
<i class="fas fa-quote-left"></i>
        To succeed in life, you need two things: ignorance and confidence.<br><span class="author">Mark Twain</span>
    </p>
</div>

<style>
    .item-title {
        font-weight: bold;
        font-size: 20px;
        padding-bottom: 5px;
    }

    .wrap-block {
        padding-left: 20px;
        font-size: 16px;
        border-left: 1px solid rgba(255, 255, 255, 0.52);
    }
</style>