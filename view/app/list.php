<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.cn
 * Date: 2015/8/12
 * Time: 14:45
 * @var $apps model\App[]
 */
?>

<div class="app-table">
	<div class="table-head">
		应用列表
	</div>
    <div class="table-div">
        <table id="apps-table">
        	<thead>
        		<tr>
        			<th>id</th>
        			<th>gameid</th>
        			<th>game_name</th>
        			<th>short</th>
        			<th class="hide">channel_id</th>
        			<th>version</th>
        			<!--<th>platformid</th>-->
        			<!--<th class="hide">app_key</th>-->
        			<!--<th class="hide">app_secret</th>-->
        			<th>zplay_key</th>
        			<th>zplay_secret</th>
        			<th>zplay_encrypt</th>
        			<th>notify_url</th>
        			<th>操作</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php
                $html = '';
        		foreach ($apps as $app) {
                    $html .= '<tr class="app-tr">';
                    // id 字段使用隐藏数据提交，而不是页面显示数据
					$html .= '<td data-prop="id" class="nodb" data-value="' . $app->id .'">' . $app->id . '</td>';
					$html .= '<td data-prop="gameid">' . $app->gameid . '</td>';
					$html .= '<td data-prop="game_name">' . $app->game_name . '</td>';
					$html .= '<td data-prop="game_short">' . $app->game_short . '</td>';
					$html .= '<td data-prop="game_channel_id" class="hide">' . $app->game_channel_id . '</td>';
					$html .= '<td data-prop="game_version">' . $app->game_version . '</td>';
					//$html .= '<td data-prop="platformid">' . $app->platformid . '</td>';
					// $html .= '<td>' . $app->buildKeysTable() . '</td>';
					// $html .= '<td>' . $app->buildSecretsTable() . '</td>';
					$html .= '<td data-prop="zplay_key">' . $app->zplay_key . '</td>';
					$html .= '<td data-prop="zplay_secret">' . $app->zplay_secret . '</td>';
					$html .= '<td data-prop="zplay_encrypt">' . $app->zplay_encrypt . '</td>';
					$html .= '<td data-prop="notify_url">' . $app->notify_url . '</td>';
                    // add is_test as a hidden area
					$html .= '<td data-prop="is_test" class="hide">' . $app->is_test . '</td>';
                    $html .= '<td class="nodb"><a href="#" class="button tiny success view-keys">查看</a><a class="button tiny alert delete-app">删除</a>';
					$html .= '</tr>';
					// add keys and secrete tr
					$html .= '<tr class="view-keys-tr"><td colspan="11" class="nodb">';
					$html .= $app->buildKeyAndSecretsTable();
                    $html .= "</td></tr>";
                }
                echo $html;
        		 ?>
        	</tbody>
        </table>
    </div>
</div>
<!--<link rel="stylesheet" type="text/css" href="/apps/static/css/jquery.dataTables.min.css">-->
<!--<script src="/apps/static/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8"></script>-->

<script type="text/javascript">
	jQuery(function($) {
		//$('#apps-table').dataTable();
        /** @var event Event */

		$('.view-keys').on('click', function(event) {
            var nextViewNode = $(this).parent().parent().next();
            var nextNodeDispaly = nextViewNode.is(':hidden');
            $('tr.view-keys-tr').slideUp();
            if (nextNodeDispaly) nextViewNode.slideDown();
            else nextViewNode.slideUp();
            // 禁止事件冒泡
            event.preventDefault();
		});

        $('.delete-app').click(function(event) {
            event.preventDefault();
            if (!confirm("确定删除这条记录？")) {
                return;
            }

            console.log('delete app');
            var trNode = $(this).parent().parent();
            var id = trNode.children().first().data('value');
            if ( !id) {
                console.log('no id found for this action');
                return;
            }
            $.ajax({
            	url: '/apps/index.php?r=app/delete',
            	type: 'POST',
            	dataType: 'json',
            	data: {id: id}
            })
            .done(function(data) {
            	console.log("success");
                    if (data.data.result == 1) {
                        alert("id 为"+id+"的应用记录已经被删除");
                        trNode.next('tr.view-keys-tr').remove();
                        trNode.remove();
                    }
            })
            .fail(function() {
            	console.log("error");
            })
            .always(function(data) {
                console.log(data);
            	console.log("complete");
            });
            
        });

        $('td').dblclick(function(event) {
            console.log("double click");
            var node = $(this);
            if (node.hasClass('nodb')) return;
            if (event.target.nodeName == 'INPUT') return;

            if (node.hasClass('inputting')) {
                var inputValue = $(this).child().val();
                node.html(inputValue);
                return;
            }

            // change node to input node
            var value = node.html();
            //node.html("");
            node.html("<input class='edit-app' value='"+ value + "' data-old-value='"+value+"'>");
            node.addClass('inputting');

            node.children('input').focus();

            // 失去焦点时提交
            $('.edit-app').on('blur', function() {
                var value = node.children().val();
                var oldValue = node.children().data('old-value');

                node.removeClass('inputting');
                node.html(value);

                // 如果输入框没有修改，则不提交
                if (value == oldValue) {
                    console.log("no need to submit value");
                    return ;
                }

                // update app here
                // package update data
                var parent = node.parents('tr.app-tr');

                // 如果这里parent为空，则修改的是keys里面的td
                if ( parent.length == 0) {
                    parent = node.parents('tr.view-keys-tr').prev();
                }

                var updateData = {};
                parent.children('td').each(function(idx, ele) {
                    updateData[$(ele).data('prop')] = $(ele).html();
                });

                // fetch id from data-value part
                updateData['id'] = '';
                updateData['id'] = parent.children().first().data('value');
                if ( !updateData['id']) {
                    alert('id字段不能为空');
                    return;
                }

                // fetch keys and secretes
                updateData['app_key'] = {};
                updateData['app_id'] = {};
                updateData['app_secret'] = {};
                parent = parent.next();
                parent.find('tr.app-detail-tr').each(function(idx, ele) {
                    var keyName = $(ele).children().first().html();
                    updateData['app_key'][keyName] = $(ele).children('.app_key').html();
                    updateData['app_id'][keyName] = $(ele).children('.app_id').html();
                    updateData['app_secret'][keyName] = $(ele).children('.app_secret').html();
                });
                updateData['server_list'] = parent.find('td.server-list-td').first().html();
                console.log(updateData);

                $.ajax({
                	url: '/apps/index.php?r=app/update',
                	type: 'POST',
                	data: updateData
                })
                .done(function(data) {
                    console.log('submit done');
                })
                .fail(function(data) {
                    console.log('submit failed');
                })
                .always(function(data) {
                    console.log(data);
                });
                
            });
        });

	})
</script>