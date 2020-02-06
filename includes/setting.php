<?php
function themeConfig($form) {
  // 引用静态资源文件
  echo '<link rel="stylesheet" href="'.staticFiles('assets/css/mdui.min.css',1).'" />';
  echo '<link rel="stylesheet" href="'.staticFiles('assets/css/setting.css',1).'" />';
  echo '<script src="'.staticFiles('assets/js/mdui.min.js',1).'"></script>';
  echo '<script src="'.staticFiles('assets/js/jquery.min.js',1).'"></script>
  <script>
  $(function () {  
    $.ajax({  
      url: "'.themeUpdate().'",  
      type: "GET",
      dataType: "json",     
      beforeSend: function() {
        $("#verison").html("正在获取新版本中...");
        $("#notice").html("正在获取公告中...");
      }, 
      error: function() {
        $("#verison").html("新版本获取出错");
        $("#notice").html("公告获取出错"); 
      },   
      success: function(data) {
        $("#verison").html(data.version);
        $("#notice").html(data.notice);
      }
    })
  });
  </script><div class="mdui-typo">';
  echo "<h2>".THEME_NAME." 主题设置 <small>作者：<a href='https://dwd.moe/'>Bhao</a></small></h2>";
  $get_ver = THEME_VERSION;
  echo "
  <div class='sweet-setting-table'>
    <div class='mdui-table-fluid'>
      <table class='mdui-table'>
        <tbody>
          <tr>
            <td>当前版本</td>
            <td>$get_ver</td>
          </tr>
          <tr>
            <td>云端版本</td>
            <td><span id='verison'></span></td>
          </tr>
          <tr>
            <td>公告</td>
            <td><span id='notice'></span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </div>
  ";
  $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('网站图标'), _t('在这里填入一个图片 URL 地址, 以加上一个 Favicon图标，没有则不填'));
  $form->addInput($favicon);
  $staticFiles = new Typecho_Widget_Helper_Form_Element_Select('staticFiles',array('local' => '本地', 'jsdelivr' => 'Jsdelivr源', 'cdn' => '自定义CDN源'), 'jsdelivr', _t('静态文件源'), _t('主题静态资源引用'));
  $form->addInput($staticFiles->multiMode());
  $staticCdn = new Typecho_Widget_Helper_Form_Element_Text('staticCdn', NULL, NULL, _t('自定义CDN源'), _t('在这里填写你自己的CDN(如 api.bhmo.cn)，以获取静态文件(需在上方选择自定义CDN)'));
  $form->addInput($staticCdn);
  $drawerContact = new Typecho_Widget_Helper_Form_Element_Textarea('drawerContact', NULL, NULL, _t('联系方式'), _t('在此填写您的联系方式，最多仅能展示6个。'));
  $form->addInput($drawerContact);
  $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('LOGO'), _t('在这里填入一个图片 URL 地址, 以加上一个 LOGO'));
  $form->addInput($logoUrl);
  $bgUrl = new Typecho_Widget_Helper_Form_Element_Text('bgUrl', NULL, NULL, _t('背景图片(电脑)'), _t('在这里填入一个图片 URL 地址, 以设置博客背景图片'));
  $form->addInput($bgUrl);
  $bgphoneUrl = new Typecho_Widget_Helper_Form_Element_Text('bgphoneUrl', NULL, NULL, _t('背景图片(手机)'), _t('在这里填入一个图片 URL 地址, 以设置博客背景图片'));
  $form->addInput($bgphoneUrl);
  $describe = new Typecho_Widget_Helper_Form_Element_Text('describe', NULL, NULL, _t('个人描述'), _t('在这里填写个人描述，以在侧边栏显示(若空则自动填充 一言)'));
  $form->addInput($describe);
  $linksDescribe = new Typecho_Widget_Helper_Form_Element_Textarea('linksDescribe', NULL,NULL, _t('友链页面介绍'), _t('在这里填写友链页面的个人介绍(支持 html )，没有则不填(需先安装友链插件哦)'));
  $form->addInput($linksDescribe);
  $linksIndex = new Typecho_Widget_Helper_Form_Element_Radio('linksIndex',array('able' => _t('启用'), 'disable' => _t('禁止'),), 'disable', _t('主页友链展示'), _t('默认开启，在首页将会展示友链中的链接'));
  $form->addInput($linksIndex);
  $linksIndexNum = new Typecho_Widget_Helper_Form_Element_Text('linksIndexNum', NULL, NULL, _t('主页友链展示个数'), _t('在这里填写主页友链最多展示个数，默认为 无限制，推荐设置为 10 个'));
  $form->addInput($linksIndexNum);
  echo '<script>
  $(function(){
    $("#typecho-option-item-staticCdn-1").hide();
    $("#staticFiles-0-1").change(function() {
        if($("#staticFiles-0-1").val()=="cdn"){
          $("#typecho-option-item-staticCdn-1").show();
        }else{
          $("#typecho-option-item-staticCdn-1").hide();
        }
    });
});
  </script>';
}
?>