<style>
    body {
        width: 610px;
    }

    #frmContact {
        border-top: #F0F0F0 2px solid;
        background: #FAF8F8;
        padding: 10px;
    }

    #frmContact div {
        margin-bottom: 15px
    }

    #frmContact div label {
        margin-left: 5px
    }

    .demoInputBox {
        padding: 10px;
        border: #F0F0F0 1px solid;
        border-radius: 4px;
    }

    .error {
        background-color: #FF6600;
        border: #AA4502 1px solid;
        padding: 5px 10px;
        color: #FFFFFF;
        border-radius: 4px;
    }

    .success {
        background-color: #12CC1A;
        border: #0FA015 1px solid;
        padding: 5px 10px;
        color: #FFFFFF;
        border-radius: 4px;
    }

    .info {
        font-size: .8em;
        color: #FF6600;
        letter-spacing: 2px;
        padding-left: 5px;
    }

    .btnAction {
        background-color: #2FC332;
        border: 0;
        padding: 10px 40px;
        color: #FFF;
        border: #F0F0F0 1px solid;
        border-radius: 4px;
    }
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
    function sendContact() {
        var valid;
        valid = validateContact();
        if (valid) {
            jQuery.ajax({
                url: "ajax.php",
                data: 'content=' + $("#content").val(),
                type: "POST",
                success: function (data) {
                    $("#mail-status").html(data);
                },
                error: function () {
                }
            });
        }
    }

    function validateContact() {
        var valid = true;
        $(".demoInputBox").css('background-color', '');
        $(".info").html('');
        if (!$("#content").val()) {
            $("#content-info").html("(required)");
            $("#content").css('background-color', '#FFFFDF');
            valid = false;
        }

        return valid;
    }
</script>
<div id="frmContact">
    <div id="mail-status"></div>
    <div>
        <label>Content</label>
        <span id="content-info" class="info"></span><br/>
        <textarea name="content" id="content" class="demoInputBox" cols="60" rows="6"></textarea>
    </div>
    <div>
        <button name="submit" class="btnAction" onClick="sendContact();">Send to validate</button>
    </div>
</div>