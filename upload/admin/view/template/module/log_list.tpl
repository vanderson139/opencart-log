<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
        <div class="pull-right">
            <a id="log-config" data-toggle="modal" data-target="#log-config-modal" title="<?php echo $text_config; ?>" class="btn btn-default"><i class="fa fa-cog"></i></a>
            <a id="log-clear" data-toggle="tooltip" title="<?php echo $text_clear; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>

            <!-- Modal -->
            <div class="modal fade" id="log-config-modal" tabindex="-1" role="log" aria-labelledby="log-config-modal-label">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $text_close; ?>"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="log-config-modal-label"><?php echo $text_config; ?></h4>

                            <form id="log-config-form" name="log-config-form">
                                <?php $actions1 = array_slice($events, 0, 49); ?>
                                <?php $actions2 = array_slice($events, 50, 49); ?>
                                <?php $actions3 = array_slice($events, 100); ?>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php foreach($actions1 as $event) {
                                            $event_arr = explode('.', $event);
                                            $event_desc = '';

                                            foreach($event_arr as $arr) {
                                                $event_desc .= ucfirst($arr) . ' ';
                                            }
                                        ?>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="checkbox pull-left">
                                                    <label><input type="checkbox" name="action[]" value="<?php echo $event; ?>" id="event-<?php echo $event; ?>" <?php echo in_array($event, $active_events) ? 'checked="checked"' : ''?>> <?php echo $event_desc; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?php foreach($actions2 as $event) {
                                            $event_arr = explode('.', $event);
                                            $event_desc = '';

                                            foreach($event_arr as $arr) {
                                                $event_desc .= ucfirst($arr) . ' ';
                                            }
                                        ?>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="checkbox pull-left">
                                                    <label><input type="checkbox" name="action[]" value="<?php echo $event; ?>" id="event-<?php echo $event; ?>" <?php echo in_array($event, $active_events) ? 'checked="checked"' : ''?>> <?php echo $event_desc; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?php foreach($actions3 as $event) {
                                            $event_arr = explode('.', $event);
                                            $event_desc = '';

                                            foreach($event_arr as $arr) {
                                                $event_desc .= ucfirst($arr) . ' ';
                                            }
                                        ?>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="checkbox pull-left">
                                                    <label><input type="checkbox" name="action[]" value="<?php echo $event; ?>" id="event-<?php echo $event; ?>" <?php echo in_array($event, $active_events) ? 'checked="checked"' : ''?>> <?php echo $event_desc; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" form="log-config-form">Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $text_close; ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $text_list; ?></h3>
      </div>
      <div class="panel-body">
        <div class="well">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-event"><?php echo $entry_event; ?></label>
                <input type="text" name="filter_event" value="<?php echo $filter_event; ?>" placeholder="<?php echo $entry_event; ?>" id="input-event" class="form-control" />
              </div>
            </div>
              <div class="col-sm-4">
                  <div class="form-group">
                      <label class="control-label" for="input-user-id"><?php echo $entry_user; ?></label>
                      <select name="filter_user_id" id="input-user-id" class="form-control">
                          <option value="*"></option>
                          <?php foreach($users as $user) { ?>
                          <option value="<?php echo $user['user_id'];?>" <?php echo $user['user_id'] == $filter_user_id ? 'selected="selected"' : ''; ?> > <?php echo $user['username']; ?></option>
                          <?php } ?>
                      </select>
                  </div>
              </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="input-date-added"><?php echo $entry_date_added; ?></label>
                    <div class="input-group date">
                        <input type="text" name="filter_date_added" value="<?php echo $filter_date_added; ?>" placeholder="<?php echo $entry_date_added; ?>" data-date-format="YYYY-MM-DD" id="input-date-added" class="form-control" />
                          <span class="input-group-btn">
                              <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                          </span>
                    </div>
                </div>
              <button type="button" id="button-filter" class="btn btn-primary pull-right"><i class="fa fa-search"></i> <?php echo $button_filter; ?></button>
            </div>
          </div>
        </div>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-left"><?php if ($sort == 'event') { ?>
                    <a href="<?php echo $sort_event; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_event; ?></a>
                    <?php } else { ?>
                    <a href="<?php echo $sort_event; ?>"><?php echo $column_event; ?></a>
                    <?php } ?></td>
                    <td class="text-left"><?php echo $column_user; ?></td>
                    <td class="text-left"><?php if ($sort == 'date_added') { ?>
                        <a href="<?php echo $sort_date_added; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_added; ?></a>
                        <?php } else { ?>
                        <a href="<?php echo $sort_date_added; ?>"><?php echo $column_date_added; ?></a>
                        <?php } ?></td>
                  <td class="text-right"><?php echo $column_action; ?></td>
                </tr>
              </thead>
              <tbody>
                <?php if ($logs) { ?>
                <?php foreach ($logs as $key => $log) { ?>
                <tr>
                  <td class="text-left"><?php echo $log['event']; ?></td>
                  <td class="text-left"><?php echo isset($log['user']['username']) ? $log['user']['username'] : 'api'; ?></td>
                  <td class="text-left"><?php echo $log['date_added']; ?></td>
                  <td class="text-right">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#log-<?php echo $key; ?>"><i class="fa fa-eye"></i></button>
                  </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="log-<?php echo $key; ?>" tabindex="-1" role="log" aria-labelledby="log-<?php echo $key; ?>-label">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $text_close; ?>"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="log-<?php echo $key; ?>-label"><?php echo $log['event']; ?><br/><?php echo $log['date_added']; ?></h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $text_close; ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $('#log-<?php echo $key; ?> .modal-body').jsonViewer(<?php echo $log['data']; ?>);
                </script>
                <?php } ?>
                <?php } else { ?>
                <tr>
                  <td class="text-center" colspan="4"><?php echo $text_no_results; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <div class="row">
          <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
          <div class="col-sm-6 text-right"><?php echo $results; ?></div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript"><!--
$('#button-filter').on('click', function() {
    var url = 'index.php?route=module/log&token=<?php echo $token; ?>';

    var filter_event = $('input[name=\'filter_event\']').val();

    if (filter_event) {
        url += '&filter_event=' + encodeURIComponent(filter_event);
    }

    var filter_user_id = $('select[name=\'filter_user_id\']').val();

    if (filter_user_id != '*') {
        url += '&filter_user_id=' + encodeURIComponent(filter_user_id);
    }

    var filter_date_added = $('input[name=\'filter_date_added\']').val();

    if (filter_date_added) {
        url += '&filter_date_added=' + encodeURIComponent(filter_date_added);
    }

    location = url;
});

$('.date').datetimepicker({
  pickDate: true,
  pickTime: false
});
//--></script>
<script type="text/javascript"><!--
$('#log-clear').click(function() {
    if(confirm("<?php echo $text_confirm; ?>")) {
        $.get("<?php echo $action_clear; ?>", function() {
            alert("<?php echo $text_clear_success; ?>");
            window.location.reload();
        });
    }
});
//--></script>
<script type="text/javascript"><!--
    $('#log-config-form').submit(function(event) {
        event.preventDefault ? event.preventDefault() : event.returnValue = false;

        $.post("<?php echo $action_config; ?>", $("#log-config-form").serialize(), function() {
            alert("<?php echo $text_config_success; ?>");
            window.location.reload();
        });
    });
    //--></script>
</div>
<?php echo $footer; ?>
