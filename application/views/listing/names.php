<script>
$(document).ready(function(){
	var processing = false;
	function getresult(url) {
        processing = true;
        $.ajax({
            url: url,
            type: "GET",
            beforeSend: function(){
				if ($(window).scrollTop() >= ($(document).height() - $(window).height()) * 0.65){
					$('#loader-icon').show();
				}
            },
            complete: function(){
                $('#loader-icon').hide();
            },
            success: function(data){
                processing = true;
                // console.log(data);
                var gutter = parseInt(jQuery('.post').css('marginBottom'));
                var $grid = $('#posts').masonry({
                    gutter: gutter,
                    // specify itemSelector so stamps do get laid out
                    itemSelector: '.post',
                    columnWidth: '.post',
                    fitWidth: true
                });
                var obj = JSON.parse(data);
                var displayString = "";
                for(i=0;i<Object.keys(obj).length-1;i++)
                {                    

                    displayString = displayString + '<div class="post">';    
                    displayString = displayString + 	'<a href="' + <?php echo '"' . BASE_URL . '"'; ?> + 'Awardees/'+ obj[i].year_awarded + '/' + obj[i].name.replace(/ /g, "_") + '" title="View Collection">';
                    displayString = displayString + 		'<div class="fixOverlayDiv">';
					displayString = displayString + 			'<img class="img-responsive" src="' + avatar_url + obj[i].year_awarded + '/' + obj[i].name.replace(/ /g, "_") + '.jpg">';
                    displayString = displayString + 		'</div>';
                    displayString = displayString + 		'<p class="image-desc">';
					displayString = displayString + 			'<strong>' + obj[i].info + '</strong>';
					displayString = displayString + 		'</p>';
                    displayString = displayString + 	'</a>';
					displayString = displayString + '<div class="trule">&nbsp;</div>';
                    displayString = displayString + '</div>';
                }   

                var $content = $(displayString); 
                $content.css('display','none');

                $grid.append($content).imagesLoaded(
                    function(){
                        $content.fadeIn(1000);
                        $grid.masonry('appended', $content);
                        processing = false;
                    }
                );

                displayString = "";
                $("#hidden-data").append(obj.hidden);

            },
            error: function(){console.log("Fail");}             
      });
    }
	
	
	$(window).scroll(function(){
        if ($(window).scrollTop() >= ($(document).height() - $(window).height()) * 0.6){
            if($(".lastpage").length == 0){
                var pagenum = parseInt($(".pagenum:last").val()) + 1;
                console.log(pagenum);
                if(!processing)
                {
                    getresult(base_url+'listing/byname/?page='+pagenum);
                }   
            }
        }
    });
});
</script>
<?php 
	$hiddenData = $data["hidden"];
	unset($data["hidden"]);
?>
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
    <div class="col-md-2 sidebar"><?php require_once('application/views/generalSidebar.php');?></div>
</div>

<div id="hidden-data">
    <?php echo $hiddenData; ?>
</div>
<div id="loader-icon"><img src="<?=STOCK_IMAGE_URL?>loading.gif" /><div>
