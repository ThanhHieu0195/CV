<div class="col-md-8 detail">
    <div class="session">
        <h3 class="title">Objective</h3>
        <h4 style="line-height: 30px">
         <?= $data['objective'] ?>
        </h4>
    </div>

    <div class="session">
        <h3 class="title-line">
            <i class="fa fa-list" aria-hidden="true" style="padding: 10px 10px"></i>
            Summary
        </h3>
        <h4 style="line-height: 30px">
         <?= $data['summary'] ?>
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
                <?php foreach ($data['works'] as $item): ?>
                <div class="wrap-block">
                    <h4>
                        <div class="row">
                            <div class="col-md-8">
                                <i style="border-bottom: 1px solid #91c190;"><?= $item['position'] ?></i>
                            </div>
                            <div class="col-md-4">
                                <div class="text-right" style="font-size: 12px"><strong><?= $item['time'] ?></strong></div>
                            </div>
                        </div>
                    </h4>
                    <?= $item['content'] ?>

                </div>
                <br>
                <?php endforeach;?>
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