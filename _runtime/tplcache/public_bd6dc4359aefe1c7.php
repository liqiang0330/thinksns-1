<?php if (!defined('THINK_PATH')) exit();?><div class="right-box mb20 clearfix border-b">
    <h3><?php echo ($title); ?></h3>
    <div id="sameUser_<?php echo ($type); ?>">
        </div>
</div>

<script type="text/javascript">
$(function (){
	var type = <?php echo $type; ?>;
	var limit = <?php echo $limit; ?>;
	$.post(U('widget/SameUser/userlist'),{type:type,limit:limit},function (res){
		$('#sameUser_'+type).html(res);
		M($('#sameUser_'+type).get(0));
	});
});
    var userReplace = function(uid, type){
        var user = new Array();
        $('#sameUserList_'+type+' li').each(function(){
            user.push(this.value);
        });  
        $("#user_"+uid).fadeOut('quick');
        $.post(U('widget/SameUser/getOneSameUser'),{type:type,user:user}, function(res){
            $('#sameUserList_'+type).append(res);
            M(document.getElementById("sameUserList_"+type));
        });
    };
</script>