<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>互联网系投稿个人创意投稿大赛</title>
    <style>
        span{color:red};
    </style>
</head>
<body>
<h1>互联网系投稿个人创意投稿大赛</h1>
<form action="verify.php" method="post" onsubmit="return check_all()">
    <table>
        <tr>
            <td>报名人数：</td>
            <td><input type="text" name="number" value="1"><input type="button" onclick="jia()" value="+"><input type="button" value="-" onclick="jian()"><span id="bao" style="display: none">不得大于10名</span></td>
        </tr>
        <tr>
            <td>姓名：</td>
            <td><input type="text" name="name" id="" onblur="check_name()"><span id="span_name"></span></td>
        </tr>
        <tr>
            <td>手机号：</td>
            <td><input type="text" name="phone" id="" onblur="check_phone()"><span id="span_phone"></span></td>
        </tr>
        <tr>
            <td>所属课程：</td>
            <td><select name="lesson_id" id="lesson" onchange="check_lesson()">
                <option value="">请选择所属课程</option>
                    <?php
                    foreach($lesson as $k){
                        echo "<option  value='".$k['lesson_id']."'>".$k['lesson_name']."</option>";
                    }
                    ?>

            </select>
                <span id="span_lesson"></span>
            </td>
        </tr>
        <tr>
            <td>您从何处得到本报名信息？</td>
            <td>
                <?php
                foreach($info as $k){
                    echo "<input type='radio' name='info_id' value=".$k['info_id']." onclick='check_info()'>".$k['info_name']."&nbsp;&nbsp;&nbsp;".$k['info_link']."<br/>";
                }
                ?>
                <span id="span_info">报名信息必须选择一项</span>
            </td>
        </tr>
        <tr>
            <td><input type="checkbox" id="xuan" onclick="check_xuan()">确认信息，并同意加入把八维软工互联网系投稿要求 </td>
            <td><span id="span_xuan"></span></td>
        </tr>
        <tr>
            <td><input type="submit" value="确认报名"></td>
        </tr>
    </table>
</form>
</body>
<script src="jq.js"></script>
<script>
    //验证所有信息
    function check_all(){
        if(check_name()&&check_phone()&&check_lesson()&&check_info()&&check_xuan()){
            return true;
        }else{
            return false;
        }
    }



    //加数
    function jia(){
        var jia=parseInt($("input[name=number]").val());
        $("input[name=number]").val(jia+1);
        if(jia>=10){
            $("input[name=number]").val(1);
            $('#bao').attr('style','display:block');
        }
    }
    //减数
    function jian(){
        var jia=parseInt($("input[name=number]").val());
        $("input[name=number]").val(jia-1);
        if(jia<=1){
            $("input[name=number]").val(1);
        }
    }

    //验证姓名
    function check_name(){
        var regu = /^[\u4e00-\u9fa5 ]{2,10}$/;
        var re = $("input[name=name]").val();
        if(re==""){
            $("#span_name").text("姓名不能为空");
            return false;
        }
        if (regu.test(re)) {
            $("#span_name").text("姓名填写正确");
            return true;
        }else{
            $("#span_name").text("姓名是中文，2到10位");
            return false;
        }
    }
    //验证手机号
    function check_phone(){
        var regu = /^1[3|4|5|8][0-9]\d{4,8}$/;
        var re = $("input[name=phone]").val();
        if(re==""){
            $("#span_phone").text("手机号不能为空");
            return false;
        }
        if (regu.test(re)) {
            $("#span_phone").text("手机号填写正确");
            return true;
        }else{
            $("#span_phone").text("手机号码是11位，以13、14、15、18开头");
            return false;
        }
    }

    //验证课程
    function check_lesson(){
        var re = $("#lesson").val();
        if(re==""){
            $("#span_lesson").text("请选择课程");
            return false;
        }else{
            $("#span_lesson").text("课程已选择");
            return true;
        }
    }

    //验证报名信息
    function check_info(){
        var Obj = $("input[name=info_id]");
        for(i=0;i<Obj.length;i++){if(Obj[i].checked){
            return true;
        }};
        if(!i==Obj.length){
            return false;
        }
    }

    //验证选中
    function check_xuan(){
        if($("#xuan").is(':checked')){
            $("#span_xuan").text("已同意");
            return true;
        }else{
             $("#span_xuan").text("请同意确认信息");
            return false;
        }
    }
</script>

</html>
