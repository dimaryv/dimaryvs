<?php
include_once('C:\xampp\htdocs\TableSite\drupal-7.65\sites\all\modules\TestTableView\controller\controller.php');
?>

<!DOCTYPE html>
<html>
 <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/dojo/1.6.0/dojo/dojo.xd.js" 
                djConfig="parseOnLoad:true"></script>
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>
        <script type="text/javascript" src="C:\xampp\htdocs\TableSite\drupal-7.65\sites\all\modules\TestTableView\model\data.json">

        </script>
        
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dijit/themes/claro/claro.css" />
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojox/grid/resources/claroGrid.css" />
        <style>
        #grid {
            height: 30em;
            width: 100em;
        }
        .dojoxGridCell {
	    text-align: center;
        }
        </style>
  <script>
      dojo.require("dojox.grid.DataGrid");
      dojo.require("dojo.data.ItemFileReadStore");
      dojo.require("dijit.form.TextBox");
      function init() {
          var lData = {
              items: <?php
                            echo list_data();
                            ?>,

              identifier: "val"
          };
          var dataStore = new dojo.data.ItemFileReadStore({data:lData});
          var layout = [[
              {'name':'val','field':'val','width':'150px'},
              {'name':'name','field':'name','width':'350px'},
              {'name':'surname','field':'surname','width':'350px'},
              {'name':'place','field':'place','width':'350px'}
          ]];
          var grid = new dojox.grid.DataGrid({
              id: 'grid',
              store: dataStore,
              structure: layout,
              rowSelector: false,
              selectionMode: 'extended',
              onStyleRow: function(row) {
                  var item = this.getItem(row.index);
                  if(item){
                      var type = this.store.getValue(item, "surname", null);
                  }
              }
          });
          grid.placeAt("gridDiv");
          grid.startup();
      }
      var plugins = {
          filter: {
              itemsName: 'songs',
              closeFilterbarButton: true,
              ruleCount: 8
          }
      };
      dojo.ready(init);
      function filterGrid() {
          dijit.byId("grid").filter({surname: dijit.byId('filterText').get('value')+'*'});
          console.log(dijit.byId('filterText').get('value')+'*');
      }

    </script>
 </head>
 <body class="claro">
    <br>
    <input dojoType="dijit.form.TextBox" id="filterText" type="text" onkeyup="filterGrid()">
    <div id="gridDiv"></div>
 </body>
</html>
