<?php
/* FileName: view_dginfo.php
 * Create Time: 2014.5.14
 * Author: song374561@gmail.com
 * Usage: To show about header, footer and its link
 * require:
 * * conf_dginfo.php
 */
?>
<?php
  require_once("conf_dginfo.php");

  function v_dginfo($choosen)
  {
    $dginfo = new dginfo;
    switch($choosen)
    {
      case 'title':
        return $dginfo->title;
      case 'header':
        return $dginfo->header;
      case 'headerlink':
        return $dginfo->headerlink;
      case 'footer':
        return $dginfo->footer;
      case 'footerlink':
        return $dginfo->footerlink;
    }
  }
?>
