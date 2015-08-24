<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.cn
 * Date: 2015/8/12
 * Time: 18:37
 */
?>
<p>添加应用</p>
<form method="post" action="/apps/web/index.php?r=app/add" >
  <div class="row">
    <div class="small-8 columns">
      <div class="row">
        <div class="small-3 columns">
          <label for="in-gameid" class="right inline">gameid</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="in-gameid" name="gameid" placeholder="input gameid">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="small-8 columns">
      <div class="row">
        <div class="small-3 columns">
          <label for="in-game_name" class="right inline">game_name</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="in-game_name" name="game_name" placeholder="input game_name">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="small-8 columns">
      <div class="row">
        <div class="small-3 columns">
          <label for="in-game_short" class="right inline">game_short</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="in-game_short" name="game_short" placeholder="input game_short">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="small-8 columns">
      <div class="row">
        <div class="small-3 columns">
          <label for="in-game_channel_id" class="right inline">game_channel_id</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="in-game_channel_id" name="game_channel_id" placeholder="input game_channel_id">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="small-8 columns">
      <div class="row">
        <div class="small-3 columns">
          <label for="in-game_version" class="right inline">game_version</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="in-game_version" name="game_version" placeholder="input game_version">
        </div>
      </div>
    </div>
  </div>

  <!--  -->
  <!--<div class="row">-->
  <!--  <div class="small-8 columns">-->
  <!--    <div class="row">-->
  <!--      <div class="small-3 columns">-->
  <!--        <label for="in-platformid" class="right inline">platformid</label>-->
  <!--      </div>-->
  <!--      <div class="small-9 columns">-->
  <!--        <input type="text" id="in-platformid" name="platformid" placeholder="input platformid">-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->

  <div class="row">
    <div class="small-8 columns">
      <div class="row">
        <div class="small-3 columns">
          <label for="in-zplay_key" class="right inline">zplay_key</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="in-zplay_key" name="zplay_key" placeholder="input zplay_key">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="small-8 columns">
      <div class="row">
        <div class="small-3 columns">
          <label for="in-zplay_secret" class="right inline">zplay_secret</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="in-zplay_secret" name="zplay_secret" placeholder="input zplay_secret">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="small-8 columns">
      <div class="row">
        <div class="small-3 columns">
          <label for="in-zplay_encrypt" class="right inline">zplay_encrypt</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="in-zplay_encrypt" name="zplay_encrypt" placeholder="input zplay_encrypt">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="small-8 columns">
      <div class="row">
        <div class="small-3 columns">
          <label for="in-server_list" class="right inline">server_list</label>
        </div>
        <div class="small-9 columns">
          <input type="text" id="in-server_list" name="server_list" placeholder="input server_list">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="small-8 columns">
      <div class="row">
        <div class="small-3 columns">
          <label for="in-notify_url" class="right inline">notify_url</label>
        </div>
        <div class="small-5 columns">
          <input type="text" id="in-notify_url" name="notify_url" placeholder="input notify_url">
        </div>
        <div class="small-1 columns">
          <label for="in-is_test" class="right inline">is_test</label>
        </div>
        <div class="small-3 columns left">
          <input type="checkbox" id="in-is_test" value="Y" name="is_test" placeholder="input is_test" checked="checked">
        </div>
      </div>
    </div>
  </div>

  <hr>
  <div class="row">
    <div class="small-8 columns">
      <div class="row">
        <div class="small-3 columns ">
          <label class="inline bold-text">app_id/app_key/app_secret</label>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="small-12 columns">
      <div class="row">
        <div class="small-1 columns">
          <label for="in-xyzs" class="right inline">xyzs</label>
        </div>
        <div class="small-3 columns ">
          <input type="text" id="in-xyzs" name="app_id[xyzs]" placeholder="input xyzs id">
        </div>
        <div class="small-3 columns">
          <input type="text" id="in-xyzs" name="app_key[xyzs]" placeholder="input xyzs key">
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-xyzs" name="app_secret[xyzs]" placeholder="input xyzs secrete">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="small-12 columns">
      <div class="row">
        <div class="small-1 columns">
          <label for="in-ppios" class="right inline">ppios</label>
        </div>
        <div class="small-3 columns ">
          <input type="text" id="in-ppios" name="app_id[ppios]" placeholder="input ppios id">
        </div>
        <div class="small-3 columns ">
          <input type="text" id="in-ppios" name="app_key[ppios]" placeholder="input ppios key">
        </div>
        <div class="small-3 columns left left">
          <input type="text" id="in-ppios" name="app_secret[ppios]" placeholder="input ppios secrete">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="small-12 columns">
      <div class="row">
        <div class="small-1 columns">
          <label for="in-guopan" class="right inline">guopan</label>
        </div>
        <div class="small-3 columns">
          <input type="text" id="in-guopan" name="app_id[guopan]" placeholder="input guopan id">
        </div>
        <div class="small-3 columns">
          <input type="text" id="in-guopan" name="app_key[guopan]" placeholder="input guopan key">
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-guopan" name="app_secret[guopan]" placeholder="input guopan secrete">
        </div>
        </div>
      </div>
    </div>

 <div class="row">
    <div class="small-12 columns">
      <div class="row">
        <div class="small-1 columns">
          <label for="in-91ios" class="right inline">91ios</label>
        </div>
        <div class="small-3 columns left left">
          <input type="text" id="in-91ios" name="app_id[91ios]" placeholder="input 91ios id">
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-91ios" name="app_key[91ios]" placeholder="input 91ios key">
        </div>
        <div class="small-3 columns left left">
          <input type="text" id="in-91ios" name="app_secret[91ios]" placeholder="input 91ios secrete">
        </div>
      </div>
    </div>
  </div>  
  <div class="row">
    <div class="small-12 columns">
      <div class="row">
        <div class="small-1 columns">
          <label for="in-i4ios" class="right inline">i4ios</label>
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-i4ios" name="app_id[i4ios]" placeholder="input i4ios id">
        </div>
        <div class="small-3 columns">
          <input type="text" id="in-i4ios" name="app_key[i4ios]" placeholder="input i4ios key">
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-i4ios" name="app_secret[i4ios]" placeholder="input i4ios secrete">
        </div>
        </div>
      </div>
    </div>

 <div class="row">
    <div class="small-12 columns">
      <div class="row">
        <div class="small-1 columns">
          <label for="in-uc" class="right inline">uc</label>
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-uc" name="app_id[uc]" placeholder="input uc app_id">
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-uc" name="app_key[uc]" placeholder="input uc app_key">
        </div>
        <div class="small-3 columns left left">
          <input type="text" id="in-uc" name="app_secret[uc]" placeholder="input uc app_secret">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="small-12 columns">
      <div class="row">
        <div class="small-1 columns">
          <label for="in-z360" class="right inline">z360</label>
        </div>
        <div class="small-3 columns">
          <input type="text" id="in-z360" name="app_id[z360]" placeholder="input z360 id">
        </div>
        <div class="small-3 columns">
          <input type="text" id="in-z360" name="app_key[z360]" placeholder="input z360 key">
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-z360" name="app_secret[z360]" placeholder="input z360 secrete">
        </div>
        </div>
      </div>
    </div>

 <div class="row">
    <div class="small-12 columns">
      <div class="row">
        <div class="small-1 columns">
          <label for="in-baidu" class="right inline">baidu</label>
        </div>
        <div class="small-3 columns left left">
          <input type="text" id="in-baidu" name="app_id[baidu]" placeholder="input baidu id">
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-baidu" name="app_key[baidu]" placeholder="input baidu key">
        </div>
        <div class="small-3 columns left left">
          <input type="text" id="in-baidu" name="app_secret[baidu]" placeholder="input baidu secrete">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="small-12 columns">
      <div class="row">
        <div class="small-1 columns">
          <label for="in-dangle" class="right inline">dangle</label>
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-dangle" name="app_id[dangle]" placeholder="input dangle id">
        </div>
        <div class="small-3 columns">
          <input type="text" id="in-dangle" name="app_key[dangle]" placeholder="input dangle key">
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-dangle" name="app_secret[dangle]" placeholder="input dangle secrete">
        </div>
        </div>
      </div>
    </div>

 <div class="row">
    <div class="small-12 columns">
      <div class="row">
        <div class="small-1 columns">
          <label for="in-xy" class="right inline">xy</label>
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-xy" name="app_id[xy]" placeholder="input xy id">
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-xy" name="app_key[xy]" placeholder="input xy key">
        </div>
        <div class="small-3 columns left left">
          <input type="text" id="in-xy" name="app_secret[xy]" placeholder="input xy secrete">
        </div>
      </div>
    </div>
  </div> 

  <div class="row">
    <div class="small-12 columns">
      <div class="row">
        <div class="small-1 columns">
          <label for="in-xiaomi" class="right inline">xiaomi</label>
        </div>
        <div class="small-3 columns left">
          <input type="text" id="in-xiaomi" name="app_id[xiaomi]" placeholder="input xiaomi id">
        </div>
        <div class="small-3 columns">
          <input type="text" id="in-xiaomi" name="app_key[xiaomi]" placeholder="input xiaomi key">
        </div>
        <div class="small-3 columns left left">
          <input type="text" id="in-xiaomi" name="app_secret[xiaomi]" placeholder="input xiaomi secrete">
        </div>
      </div>
    </div>
  </div>

  <div class="row large-centered small-centered">
    <div class="small-8 columns right">
      <div class="row">
        <div class="small-12 columns ">
          <input type="submit" id="right-label" value="提交" class="button ">
        </div>
      </div>
    </div>
  </div>
</form>