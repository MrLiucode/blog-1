/**
 * Created by lilichun on 2015/9/30 0030.
 */
var newAlert = {
    show : function(option, showCancel, isError){
        var header = jsonInput.get(option, 'title', '温馨提示');
        var msg = jsonInput.get(option, 'msg', '出现未知错误');
        var cancelBtn = jsonInput.get(option, 'cancelBtn', '');
        var cancelBtnHtml = cancelBtn ? '<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>' : '';
       isError = isError ? true : false;
        var callBackFunc = jsonInput.get(option, 'callable', null);

        var cancelBtnHtml = showCancel ? '<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">取消</a>' : '';

        $(document).on('click', '#modal-done-btn', function(event){
            event.preventDefault();
            if(callBackFunc){
                callBackFunc();
            }
            $("#modal-alert").remove();
        });


        var contentClass = isError ? 'alert-danger' : '';
        var doneBtnClass = isError ? 'btn-danger' : 'btn-primary';

        var htmlStr = '<div class="modal fade" id="modal-alert"><div class="modal-dialog"><div class="modal-content"> <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title">' + header + '</h4></div><div class="modal-body"><div class="alert ' + contentClass + ' m-b-0"><p>' + msg + '</p></div></div><div class="modal-footer">' + cancelBtnHtml + '<a id="modal-done-btn" href="javascript:;" class="btn btn-sm ' + doneBtnClass + '" data-dismiss="modal">确定</a></div></div></div></div>';
        $('body').append(htmlStr);
        $("#modal-alert").modal('show');
    }
};

var jsonInput = {
    get : function(jsonStr, keyName, defaultVal){
        return (typeof(jsonStr) == "undefined" || jsonStr == null || jsonStr == '' ||
        (!jsonStr.hasOwnProperty(keyName))  ) ? defaultVal : jsonStr[keyName];
    }
};
