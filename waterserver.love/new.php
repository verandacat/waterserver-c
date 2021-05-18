<?php
  $redirect[1] = "https://h.accesstrade.net/sp/cc?rk=0100l9vx00bp82"; //shinano.html
  $redirect[2] = "http://h.accesstrade.net/sp/cc?rk=0100nbjp00bp82"; //kirala.html
  $redirect[3] = "https://track.affiliate-b.com/visit.php?guid=ON&a=t8195i-v2755388&p=0805307"; //aqua
  $redirect[4] = "https://track.affiliate-b.com/visit.php?guid=ON&a=q1398F-630765j&p=1506217y"; //crystal.html
  $redirect[5] = "https://track.affiliate-b.com/visit.php?guid=ON&a=M6645y-P223157X&p=15062"; //5ban.html

  $redirect[6] = "https://track.affiliate-b.com/visit.php?guid=ON&a=d2423k-l195973q&p=1506217y"; //energy.html
  $redirect[7] = "https://h.accesstrade.net/sp/cc?rk=0100o8bw00bp82"; //premium.html
  $redirect[8] = "http://h.accesstrade.net/sp/cc?rk=0100mxgw00bp82"; //suntry.html
  $redirect[9] = "http://h.accesstrade.net/sp/cc?rk=0100mnhr00bp82"; //creclamio.html
  $redirect[10] = "https://h.accesstrade.net/sp/cc?rk=0100nxsv00bp82"; //fujinoyusui.html

  $redirect[11] = "http://h.accesstrade.net/sp/cc?rk=0100h3ml006pd3"; //ideal.html
  $redirect[12] = "http://ad.scadnet.com/8Ef5IF/i4/"; //kirin.html
  $redirect[13] = "http://px.a8.net/svt/ejp?a8mat=1ZIMUV+B0KSII+1Z2W+6FWRL"; //megumiwater.html
  $redirect[14] = "http://px.a8.net/svt/ejp?a8mat=2BF8BQ+7OB6RU+2M2E+5YRHD"; //sakura.html
  $redirect[15] = "http://h.accesstrade.net/sp/cc?rk=01005i4800bizl"; //elfile.html

  $redirect[16] = "http://h.accesstrade.net/sp/cc?rk=01003l4z00bizl"; //fujiseiryu.html
  $redirect[17] = "http://h.accesstrade.net/sp/cc?rk=0100cnwv00bizl"; //furele.html
  $redirect[18] = "http://h.accesstrade.net/sp/cc?rk=0100m5wd00bizl"; //crecla.html
  $redirect[19] = "http://www.rentracks.jp/adx/r.html?idx=0.1077.64977.934.1555&dna=24616"; //merqulop.html
  $redirect[20] = "http://h.accesstrade.net/sp/cc?rk=0100cp0500bizl"; //hawaiiwater.html

  $redirect[21] = "http://h.accesstrade.net/sp/cc?rk=0100fk1z006pd3"; //oneway.html
  $redirect[22] = "https://www.hikakude.jp/waterserver/lp/lp0015.html"; //mcmmegumi.html
  $redirect[23] = "https://track.affiliate-b.com/visit.php?guid=ON&a=y4590v-i136246H&p=0805307"; //urunon.html
  $redirect[24] = "http://h.accesstrade.net/sp/cc?rk=0100f44800bizl"; //mituuroko.html
  $redirect[25] = "http://h.accesstrade.net/sp/cc?rk=0100ezmr006pd3"; //aqua-magic.html

  $redirect[26] = "http://h.accesstrade.net/sp/cc?rk=0100erb300bizl"; //alpina-water.html
  $redirect[27] = "http://h.accesstrade.net/sp/cc?rk=0100ax0m006pd3"; //b-water.html
  $redirect[28] = "http://h.accesstrade.net/sp/cc?rk=0100im1l00bp82"; //aquaclara.html
  $redirect[29] = "http://h.accesstrade.net/sp/cc?rk=0100ksxs006pd3"; //frecious.html
  $redirect[30] = "http://h.accesstrade.net/sp/cc?rk=0100jdv400bizl"; //clytia.html

  $redirect[31] = "https://h.accesstrade.net/sp/cc?rk=0100hg2w006pd3"; //cosmowater.html
  $redirect[32] = "http://ad.isaf.jp/bin/w.x?p=1794&b=544&o=530&s=535"; //aquaclara.html
 
  $redirect[33] = "http://h.accesstrade.net/sp/cc?rk=0100dwak00bp82"; //アクアアドバンス
  $redirect[34] = "https://h.accesstrade.net/sp/cc?rk=0100nfqg00bp82"; //ベビアクアプラン

  $redirect[35] = "https://h.accesstrade.net/sp/cc?rk=0100nm7n006pd3"; //frecious-norikae
  $redirect[36] = "https://h.accesstrade.net/sp/cc?rk=0100o9ae00bp82"; //frecious-slat2
  $redirect[37] = "https://h.accesstrade.net/sp/cc?rk=0100h8c8006pd3"; //frecious-dewo



  if( isset($_GET['id']) ){
    $id = intval($_GET['id']);
    header("Location:$redirect[$id]");
  }
?>