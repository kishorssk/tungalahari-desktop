<div class="container">
    <div class="row">
<?php foreach ($data as $row) { ?>
        <div class="col-md-2 year-holder">
            <a class="year-btn" href="<?=BASE_URL?>listing/awardees/<?= $row->year_awarded?>"><?= $row->year_awarded?></a>
        </div>
<?php } ?>
    </div>
</div>
