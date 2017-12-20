/**
 * Table Widget.
 * @module widgets/table
 * @param {object} options - Widget init options
 * @author AdminBootstrap.com
 */

App.classes.TableWidget = function(options) {
  var o = options || {};

  /**
   * @const {object} Constant css-selectors to link up with HTML markup.
   */
  var c = {};


  /**
   * @var {object} Module settings object.
   */
  var s = {
    $table:       $(o.table),
    $info:        $(o.info),
    $search:      $(o.search),
    $length:      $(o.length),
    $pagination:  $(o.pagination),
    $buttons:     $(o.buttons),
    dataTable:    null
  };


  /**
   * @function Validate initial options
   *
   * @return {boolean} Result
   */
  function validate() {

    try {
      if (typeof $.fn.DataTable != 'function') throw "TableWidget: DataTables Plugin is not found.";
      if (!s.$table.length && !s.$table.is('table')) throw "TableWidget: '" + o.table + "' is not valid table.";
    } catch(e) {
      console.warn(e);
      return false;
    }

    return true;
  }

  // DataTable Plugin Init
  function initDataTable() {
    // Init length Select
    s.$length.select2({});

    // DataTable options
    var options = {
      'dom': 't',
      'pagingType': 'numbers',
      'pageLength': parseInt(s.$length.val()) || 10,
      'language': {
        'paginate': {
            'previous': 'Prev'
        }
      }
    };

    if (o.checkboxes) {
      options.select = {
        'style': 'multi',
        'selector': 'td:first-child input[type="checkbox"]'
      }
    }
    
    if (o.info) {
      options.dom += 'i';
    }

    if (o.pagination) {
      options.dom += 'p';
    }

    s.dataTable = s.$table.DataTable($.extend(options, o.dataTable));

    // Move Pagination
    if (s.$pagination.length) {
      $(s.dataTable.table().container()).find('.dataTables_paginate').appendTo(s.$pagination);
    }

    // Move Info
    if (s.$info.length) {
      $(s.dataTable.table().container()).find('.dataTables_info').appendTo(s.$info);
    }

    // Move Buttons
    if (s.$buttons.length) {
      s.dataTable.buttons( 0, null ).container().appendTo(s.$buttons);
    }
  }

  function bindUIActions() {
    // Table length control
    if (s.$length.length) {
      s.$length.on('change', function () {
        s.dataTable.page.len(parseInt($(this).val())).draw();
      });
    }
    // Table Search
    if (s.$search.length) {
      s.$search.on('keyup', function () {
        s.dataTable.search($(this).val()).draw();
      });
    }
    // Select/Deselect row Events
    s.dataTable
      .on('select', function ( e, dt, type, indexes ) {
        if (o.checkboxes) {
          indexes.forEach(function(row) {
            $(dt.row(row).node()).find('input[type="checkbox"]').prop('checked', true);
          })
        }
      })
      .on('deselect', function ( e, dt, type, indexes ) {
        if (o.checkboxes) {
          indexes.forEach(function(row) {
            $(dt.row(row).node()).find('input[type="checkbox"]').prop('checked', false);
          })
          if (!dt.rows({selected: true})[0].length) {
            $(dt.table().header()).find('th:first-child input[type="checkbox"]').prop('checked', false);
          }
        }
      })
      // Select/Deselect All Rows
      if (o.checkboxes) {
        var $checkall = $(s.dataTable.table().header()).find('th:first-child input[type="checkbox"]');
        $checkall.on('change', function() {
          if ($(this).prop('checked')) {
            s.dataTable.rows().select();
          } else {
            s.dataTable.rows().deselect();
          }
        })
      }
  }

  function init() {
    if (validate()) {
      initDataTable();
      bindUIActions();
    }
  };

  init();

  s.clearSearch = function() {
    if (this.$search.length) {
      this.$search.val('');
      this.dataTable.search('').draw();
    }
  }

  s.getSelected = function() {
    return this.dataTable.rows({ selected: true });
  }

  return s;
};