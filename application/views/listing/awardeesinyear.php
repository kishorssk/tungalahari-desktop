<div id="grid" class="container-fluid">
    <div id="posts">
<?php foreach ($data as $row) { ?>
        <div class="post">
            <a href="<?=BASE_URL?>Awardees/<?=$row->year_awarded?>/<?=str_replace(' ', '_', $row->name)?>" title="View Awardee">
                <div class="fixOverlayDiv">
                    <img class="img-responsive" src="<?=$viewHelper->includeAvatarPhotos($row->name,$row->year_awarded)?>">
                </div>
                <p class="image-desc">
                    <strong><?=$row->info?></strong>
                </p>
            </a>
            <div class="trule">&nbsp;</div>
        </div>
<?php } ?>
    </div>
</div>
