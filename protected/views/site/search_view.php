
<a class="row searchResult" href="<?php echo $data['url'];?>">
<div class="num"></div>
<div class="searchContent">

<div class="searchTitle"><?php echo $data['title'];?></div>
<div class="searchDescription"><?php echo $data['text'];?></div>
<div class="searchMetadata"><?php echo $data['url'];?> (rank: <?php echo round($data['score'],4);?>)</div>


</div>
</a>
