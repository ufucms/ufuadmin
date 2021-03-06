layui.use(['form', 'button', 'popup', 'http'], function () {
  if (window !== top) {
    top.location.href = location.href;
  }

  var form = layui.form;
  var button = layui.button;
  var popup = layui.popup;

  // 登 录 提 交
  form.on('submit(login)', function (data) {
    /// 验证
    /// 登录
    /// 动画
    button.load({
      elem: '.login',
      time: 1000,
      done: function () {
        popup.success("登录成功", function () {
          location.href = "code.html"
        });
      }
    });

    return false;
  });
})
