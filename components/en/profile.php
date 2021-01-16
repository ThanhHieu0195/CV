<div class="col-md-4 profile">
    <div class="block-avt">
        <img class="avt" src="<?= $data['basic_info']['profile_url'] ?>" alt="">
    </div>
    <div class="row">
        <div class="session">
            <ul class="basic-profile">
                <li>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <h4><?= $data['basic_info']['phone'] ?></h4>
                </li>
                <li>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <h4><?= $data['basic_info']['email'] ?></h4>
                </li>
                <li style="position: relative">
                    <i class="fa fa-location-arrow" aria-hidden="true" style="top: 6px;position: absolute;"></i>
                    <h4 style="padding-left: 60px; line-height: 20px"><?= $data['basic_info']['location'] ?></h4>
                </li>
            </ul>
        </div>
        <?php foreach ($data['basic_info']['details'] as $key => $arr): ?>
         <div class="session">
            <h3 class="title-line"><?= $key ?></h3>
            <ul>
                <?php foreach($arr as $text): ?>
                <li class="item-skill">
                    <h4 class="line-height-25"><?= $text ?></h4>
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