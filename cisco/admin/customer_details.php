<?php include('header.php');?>
<div class="st-main">
<div class="st-crumbs">
          <div class="fluid-cols">
            <div class="expand-col text-ellipsis">
              <ul>
                <li><span>The <b>Just</b> 1.0.0 by Admin<b>Bootstrap</b></span></li>
              </ul>
            </div>
            <div class="min-col">
              <div class="st-search">
                <input class="form-control input-sm" type="text" placeholder="Search">
              </div>
            </div>
          </div>
        </div>
        <div class="st-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6 col-md-3 mb">
                <div class="st-panel st-panel--border">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Income</span><small>Month</small></span></div>
                        <div class="min-col">
                          <div class="st-panel__tools">
                            <div class="st-panel-tool"><span class="label label-success">$1,200</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="text-ellipsis text-center" style="font-size: 24px;">$25,235.00</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 mb">
                <div class="st-panel st-panel--border">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Payments</span><small>Out</small></span></div>
                        <div class="min-col">
                          <div class="st-panel__tools">
                            <div class="st-panel-tool">
                              <div class="sparkline" values="15, 14, 13, 14, 16, 17, 15" sparkType="bar" sparkBarColor="#45BDDC" sparkBarWidth="3" sparkBarSpacing="1" sparkChartRangeMin1="0"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="text-ellipsis text-center" style="font-size: 24px;">$120,840.00</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-md-2 mb">
                <div class="st-panel st-panel--border">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Rating</span><small>Avg</small></span></div>
                        <div class="min-col">
                          <div class="st-panel__tools">
                            <div class="st-panel-tool"><i class="text-warning fa fa-star"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="text-ellipsis text-center" style="font-size: 24px;">4.8</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-md-2 mb">
                <div class="st-panel st-panel--border">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Growth</span></span></div>
                        <div class="min-col">
                          <div class="st-panel__tools">
                            <div class="st-panel-tool"><span class="label label-info">25</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="st-panel__content" style="height: 36px;">
                      <iframe id="resize-iframe" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                      <div class="sparkline" values="8, 2, 4, 3, 5, 4, 3, 5, 5, 6, 3, 9, 7, 3, 5, 6, 9, 5, 6, 7, 2, 3, 9, 6, 6, 7, 8, 10, 15, 16, 17, 15" sparkType="line" sparkWidth="100%" sparkHeight="36" sparkFillColor="#dff7fd" sparkLineWidth="1" sparkLineColor="#45BDDC" sparkHighlightLineColor="#45BDDC" sparkChartRangeMin="" sparkSpotColor="" sparkMinSpotColor="" sparkMaxSpotColor=""></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-md-2 mb">
                <div class="st-panel st-panel--border">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis text-center"><span class="st-panel__title"><span>Users</span></span></div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="text-ellipsis text-center" style="font-size: 24px;">180 / <small>20</small></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-fluid mb">
                <div class="st-panel">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Detailed Analytics</span><small>Sales & Users</small></span></div>
                        <div class="min-col">
                          <div class="st-panel__form">
                            <div class="btn btn-sm btn-default" id="dc-range"><i class="fa fa-calendar"></i><span class="hidden-xs">Set Dates Range</span></div>
                          </div>
                          <div class="st-panel__tools">
                            <div class="st-popup" id="dc-settings" style="width: 250px;">
                              <div class="form">
                                <div class="container-fluid no-paddings">
                                  <div class="row">
                                    <div class="col-xs-5"><b>Group By</b>
                                      <div class="form-group">
                                        <div class="radio">
                                          <input type="radio" name="dc-set-group" value="hour" id="dc-group-hour">
                                          <label for="dc-group-hour">Hour</label>
                                        </div>
                                        <div class="radio">
                                          <input type="radio" name="dc-set-group" value="day" id="dc-group-day" checked="checked">
                                          <label for="dc-group-day">Day</label>
                                        </div>
                                        <div class="radio">
                                          <input type="radio" name="dc-set-group" value="week" id="dc-group-week">
                                          <label for="dc-group-week">Week</label>
                                        </div>
                                        <div class="radio">
                                          <input type="radio" name="dc-set-group" value="month" id="dc-group-month">
                                          <label for="dc-group-month">Month</label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-xs-7"><b>Settings</b>
                                      <div class="form-group">
                                        <div class="checkbox">
                                          <input type="checkbox" id="dc-set-legend">
                                          <label for="dc-set-legend">Show Legend</label>
                                        </div>
                                        <div class="checkbox">
                                          <input type="checkbox" id="dc-set-scrollbar">
                                          <label for="dc-set-scrollbar">Scrollbar</label>
                                        </div>
                                        <div class="checkbox">
                                          <input type="checkbox" id="dc-set-tables" checked="checked">
                                          <label for="dc-set-tables">Data Tables</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="st-panel-tool" data-toggle="popup" data-target="#dc-settings"><i class="fa fa-cog"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div id="dc-chart" style="height: 300px; margin: 0 -15px 0px;"></div>
                      <div id="dc-tables">
                        <ul class="nav nav-tabs tabs-right" role="tablist" data-subtitle="#dc-tables-subtitle">
                          <li class="tabs-title" style="padding-left: 15px;"><span>Data</span> <small id="dc-tables-subtitle">Sales</small>
                          </li>
                          <li class="active"><a href="#dc-tab-sales" data-toggle="tab">Sales</a></li>
                          <li><a href="#dc-tab-users" data-toggle="tab">Users</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="dc-tab-sales">
                            <div class="table-responsive table-responsive-bordered" width="100%" style="margin: 15px 0;">
                              <table class="table table-bordered table-filled table-hover" id="dc-table-sales">
                                <thead>
                                  <tr>
                                    <th class="text-nowrap">Product</th>
                                    <th class="content-width">Price</th>
                                    <th class="content-width">Date</th>
                                    <th class="content-width">Status</th>
                                    <th class="content-width">                      </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="text-nowrap">Test Row</td>
                                    <td data-filter="30">$30.00</td>
                                    <td class="text-nowrap" data-filter="1476903600000" data-sort="1476903600000" data-search="20 October 2016">20 Oct 2016 23:10</td>
                                    <td data-filter="1" data-sort="1"><span class="label label-success">Completed</span></td>
                                    <td class="text-right"><a class="btn btn-default btn-xs">View</a></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="pagination-xs text-center" id="dc-table-sales-p"></div>
                          </div>
                          <div class="tab-pane" id="dc-tab-users">
                            <div class="table-responsive table-responsive-bordered" width="100%" style="margin: 15px 0;">
                              <table class="table table-bordered table-filled table-hover" id="dc-table-users">
                                <thead>
                                  <tr>
                                    <th class="text-nowrap">Name</th>
                                    <th class="text-nowrap">Username</th>
                                    <th class="content-width">Date</th>
                                    <th class="content-width">Status</th>
                                    <th class="content-width"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Nick</td>
                                    <td>@fury_road</td>
                                    <td class="text-nowrap" data-filter="1476903600000" data-sort="1476903600000" data-search="20 October 2016">20 Oct 2016 23:10</td>
                                    <td data-filter="1" data-sort="1"><span class="label label-success">Active</span></td>
                                    <td class="text-right"><a class="btn btn-default btn-xs" href="app-profile.html">View</a></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="pagination-xs text-center" id="dc-table-users-p"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-fixed">
                <div class="st-panel st-afeed">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col">
                          <div class="st-panel__title text-center"><span>Activity Feed</span></div>
                        </div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="st-afeed-calendar">
                        <div id="afeed-calendar"></div>
                        <div class="text-center" id="afeed-calendar__cont"></div>
                      </div>
                      <div class="st-afeed__body">
                        <div class="st-afeed__tabs">
                          <ul role="tablist">
                            <li class="active"><a href="#afeed-stats" data-toggle="tab">Stats</a></li>
                            <li><a href="#afeed-events" data-toggle="tab">Events <span class="badge st-afeed-events__counter"></span></a></li>
                            <li><a href="#afeed-feed" data-toggle="tab">Feed</a></li>
                          </ul>
                        </div>
                        <div class="tab-content">
                          <div class="tab-pane active" id="afeed-stats">
                            <div class="st-afeed-stats"></div>
                          </div>
                          <div class="tab-pane" id="afeed-events">
                            <div class="st-afeed-events scrollbar">
                              <div class="st-afeed-events__list"></div>
                            </div>
                          </div>
                          <div class="tab-pane" id="afeed-feed">
                            <div class="st-afeed-feed scrollbar">
                              <div class="st-afeed-feed__list"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="st-spanel">
          <div class="st-spanel__tabs">
            <ul class="nav">
              <li class="active alt"><a href="#settings" data-toggle="tab" tabindex="-1">Settings</a></li>
              <li><a href="#notifications" data-toggle="tab" tabindex="-1">Notifications</a></li>
              <li class="st-spanel__close"><a class="fa fa-long-arrow-right" tabindex="-1"></a></li>
            </ul>
          </div>
          <div class="st-spanel__content">
            <div class="tab-content">
              <div class="tab-pane fade in active" id="settings">
                <div class="st-spanel__settings">
                  <div class="st-spanel__scroll scrollbar">
                    <div class="st-settings" id="app-settings">
                      <div class="st-settings__list">
                        <div class="st-settings__item">
                          <div class="st-settings__row">
                            <div class="st-settings__label"><b>App Settings</b></div>
                            <div class="st-settings__control"><i class="fa fa-spin fa-circle-o-notch st-settings__loader"></i></div>
                          </div>
                        </div>
                        <div class="st-settings__item">
                          <div class="st-settings__row">
                            <div class="st-settings__label">Site Available</div>
                            <div class="st-settings__control">
                              <input id="app-settings__site" type="checkbox" name="site" checked="checked">
                            </div>
                          </div>
                        </div>
                        <div class="st-settings__item">
                          <div class="st-settings__row">
                            <div class="st-settings__label">Notifications</div>
                            <div class="st-settings__control">
                              <input id="app-settings__notifications" type="checkbox" name="notifications" checked="checked">
                            </div>
                          </div>
                        </div>
                        <div class="st-settings__item">
                          <div class="st-settings__row">
                            <div class="st-settings__label">Debug Mode</div>
                            <div class="st-settings__control">
                              <input id="app-settings__debug" type="checkbox" name="debug">
                            </div>
                          </div>
                        </div>
                        <div class="st-settings__item">
                          <div class="st-settings__row st-settings__expand">
                            <div class="st-settings__label">Cron Workers</div>
                            <div class="st-settings__control text-nowrap"><i class="fa fa-angle-right st-settings__ico"></i></div>
                          </div>
                          <div class="st-settings__sub">
                            <div class="st-settings__item">
                              <div class="st-settings__row">
                                <div class="st-settings__label">Backuper</div>
                                <div class="st-settings__control">
                                  <input id="app-settings__backuper" type="checkbox" name="backuper" checked="checked">
                                </div>
                              </div>
                            </div>
                            <div class="st-settings__item">
                              <div class="st-settings__row">
                                <div class="st-settings__label">Storage Optimizer</div>
                                <div class="st-settings__control">
                                  <input id="app-settings__optimizer" type="checkbox" name="optimizer" checked="checked">
                                </div>
                              </div>
                            </div>
                            <div class="st-settings__item">
                              <div class="st-settings__row">
                                <div class="st-settings__label">Reports Export</div>
                                <div class="st-settings__control">
                                  <input id="app-settings__reports" type="checkbox" name="reports" checked="checked">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="st-settings" id="mailing-settings">
                      <div class="st-settings__list">
                        <div class="st-settings__item">
                          <div class="st-settings__row">
                            <div class="st-settings__label"><b>Mailing</b></div>
                            <div class="st-settings__control"><i class="fa fa-spin fa-circle-o-notch st-settings__loader"></i></div>
                          </div>
                        </div>
                        <div class="st-settings__item">
                          <div class="st-settings__row">
                            <div class="st-settings__label">Send Mails</div>
                            <div class="st-settings__control">
                              <input id="mailing-settings__send" type="checkbox" name="send" checked="checked">
                            </div>
                          </div>
                        </div>
                        <div class="st-settings__item">
                          <div class="st-settings__row">
                            <div class="st-settings__label">Driver</div>
                            <div class="st-settings__control">
                              <div class="select2-contented select2-sm">
                                <select class="form-control" id="mailing-settings__driver" name="driver" data-minimum-results-for-search="Infinity">
                                  <option value="smpt">SMPT</option>
                                  <option value="mailgun" selected="selected">Mailgun</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="st-settings__item">
                          <div class="st-settings__row">
                            <div class="st-settings__label">Daily Limit</div>
                            <div class="st-settings__control text-nowrap"><span class="label label-danger settings-label">2500</span></div>
                          </div>
                          <div class="st-settings__row">
                            <div class="st-settings__control">
                              <div class="slider-danger slider-novalues">
                                <input id="mailing-settings__limit" name="limit" data-grid="true" data-min="0" data-max="5000" data-from="2500" data-step="50" data-hide-min-max="true" data-hide-from-to="true">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="notifications">
                <div class="st-notifications">
                  <div class="st-notifications__head">
                    <div class="fluid-cols">
                      <div class="expand-col">
                        <div class="st-notifications__title">New Alerts</div><small>You have <span class="st-notifications__count">0</span> alerts.</small>
                      </div>
                      <div class="min-col">
                        <button class="btn btn-default btn-sm st-notifications__all">Mark All</button>
                      </div>
                    </div>
                  </div>
                  <div class="st-notifications__list">
                    <div class="st-spanel__scroll scrollbar">
                      <div class="st-notification new">
                        <div class="st-notification__ico"><i class="fa fa-cog"></i></div>
                        <div class="st-notification__main">
                          <div class="st-notification__title"><b>System</b><small>25m ago</small>
                            <div class="st-notification__mark"><i class="fa fa-check"></i></div>
                          </div>
                          <p>Lorem ipsum dolor sit.</p>
                        </div>
                      </div>
                      <div class="st-notification new">
                        <div class="st-notification__ico"><i class="fa fa-check"></i></div>
                        <div class="st-notification__main">
                          <div class="st-notification__title"><b>Verification</b><small>1h 30m ago</small>
                            <div class="st-notification__mark"><i class="fa fa-check"></i></div>
                          </div>
                          <p>Lorem ipsum dolor sit. Lorem ipsum.</p>
                        </div>
                      </div>
                      <div class="st-notification">
                        <div class="st-notification__ico"><i class="fa fa-user"></i></div>
                        <div class="st-notification__main">
                          <div class="st-notification__title"><b>Account</b><small>25 Feb 21:30</small>
                            <div class="st-notification__mark"><i class="fa fa-check"></i></div>
                          </div>
                          <p><a href="#">John Doe</a> has been registered.</p>
                        </div>
                      </div>
                      <div class="st-notification">
                        <div class="st-notification__ico"><i class="fa fa-user"></i></div>
                        <div class="st-notification__main">
                          <div class="st-notification__title"><b>Account</b><small>25 Feb 21:30</small>
                            <div class="st-notification__mark"><i class="fa fa-check"></i></div>
                          </div>
                          <p><a href="#">John Doe</a> has been registered.</p>
                        </div>
                      </div>
                      <div class="st-notification">
                        <div class="st-notification__ico"><i class="fa fa-user"></i></div>
                        <div class="st-notification__main">
                          <div class="st-notification__title"><b>Account</b><small>25 Feb 21:30</small>
                            <div class="st-notification__mark"><i class="fa fa-check"></i></div>
                          </div>
                          <p><a href="#">John Doe</a> has been registered.</p>
                        </div>
                      </div>
                      <div class="st-notification">
                        <div class="st-notification__ico"><i class="fa fa-user"></i></div>
                        <div class="st-notification__main">
                          <div class="st-notification__title"><b>Account</b><small>25 Feb 21:30</small>
                            <div class="st-notification__mark"><i class="fa fa-check"></i></div>
                          </div>
                          <p><a href="#">John Doe</a> has been registered.</p>
                        </div>
                      </div>
                      <div class="st-notification">
                        <div class="st-notification__ico"><i class="fa fa-user"></i></div>
                        <div class="st-notification__main">
                          <div class="st-notification__title"><b>Account</b><small>25 Feb 21:30</small>
                            <div class="st-notification__mark"><i class="fa fa-check"></i></div>
                          </div>
                          <p><a href="#">John Doe</a> has been registered.</p>
                        </div>
                      </div>
                      <div class="st-notification">
                        <div class="st-notification__ico"><i class="fa fa-user"></i></div>
                        <div class="st-notification__main">
                          <div class="st-notification__title"><b>Account</b><small>25 Feb 21:30</small>
                            <div class="st-notification__mark"><i class="fa fa-check"></i></div>
                          </div>
                          <p><a href="#">John Doe</a> has been registered.</p>
                        </div>
                      </div>
                      <div class="st-notification">
                        <div class="st-notification__ico"><i class="fa fa-user"></i></div>
                        <div class="st-notification__main">
                          <div class="st-notification__title"><b>Account</b><small>25 Feb 21:30</small>
                            <div class="st-notification__mark"><i class="fa fa-check"></i></div>
                          </div>
                          <p><a href="#">John Doe</a> has been registered.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="source-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <div class="st-source st-source--copy">
              <div class="st-source__copy st-clip" data-clipboard-target="#source-code">Copy</div>
              <pre><code class="html" id="source-code"></code></pre>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    </div>
	<?php include('footer.php');?>