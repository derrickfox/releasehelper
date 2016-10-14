#Generic Dashboard List Settings Configuration Document:

A dashboard is LabShare's way of displaying information to the user about data that is stored in a SharePoint list. 
Follow these steps to create a LabShare dashboard:

1.  Create a SharePoint list.
2.  In your browser, input the following URL: (domain_name)/_layouts/ls/(release_name)/default.aspx#/facility/list/(list's internal SP name)/settings
    Example)  rnai.ncats.nih.gov/_layouts/ls/16.922/default.aspx#/facility/list/instruments/settings
3.  Configure the dashboard's settings using the JSON template below with all of the appropriate information. Replace the key "myDashboard" with a unique dashboard name of your choosing.
4.  Click the Save icon to save your new settings.
5.  In your browser, input the following URL: (domain_name)/_layouts/ls/(release_name)/default.aspx#/facility/list/(list's internal SP name)/dashboard/(dashboard's unique name)
    
Below is the placement of a dashboard inside the list settings:

        {
            "dashboards" : {
                "myDashboard" : {
                    "name" : <string>,
                    "title" : <string>,
                    "route" : <string>,
                    "data" : {
                        "rolesRequired" : [
                            0 : <string>,
                            1 : <string>
                        ]
                    },
                    "panels" : {
                        "firstPanel" : {...},
                        "secondPanel" : {...},
                        "Filter" : {...}
                    },
                    "layout" : {
                        "layout" : row,
                        "panels" : [
                            0 : {
                                    "layout" : column,
                                    "width" : <string>,
                                    "panels" : [
                                        0 : Filter
                                    ]
                                },
                            1 : {
                                    "layout" : column,
                                    "panels" : [
                                        0 : firstPanel
                                    ]
                                }
                        ]
                    }
                }
            }
            "forms" : {
                "new" : {...},
                "view" : {...}
            }
        }
                    
##Properties
1.  <a href="#name">name</a> : text
2.  <a href="#title">title</a> : text
3.  <a href="#route">route</a> : text
4.  <a href="#data">data</a> : object
    1. <a href="#rolesRequired">rolesRequired</a> : array of strings
5.  <a href="#panels">panels</a> : object
    1. <a href="#Filter">Filter</a> : text
6.  <a href="#layout">layout</a> : object
    1. <a href="#layout.layout">layout</a> : row 
    2. <a href="#layout.panels">panels</a> : array of objects 
        1. <a href="#layout.panels.layout">layout</a> : column
        2. <a href="#width">width</a> : text
        3. <a href="#layout.panels.panels">panels</a> : array
            1. 0 : Filter
            2. 1 : (panel_name)


##Panels
  
The panels property contains a dictionary of panels, where the key is the panel's ID and the value is an object containing panel configuration.

The main panel configuration properties are:
  * `type` - The LabShare directive to use for the panel
  * `title` - The name for the panel. It will appear in the panel header.
  * `Header` - Object containing specifications of the actions that will exist in the header
  * `isCollapsible` - Optional Boolean setting for whether the panel can be minimized and expanded. (Default: true)
  * `isMaximizable` - Optional Boolean setting for whether the panel can be opened to fullscreen. (Default: true)
  * `flex` - Optional setting of the flex behavior of the panel. (Default: true)
  * `hide-sm` - Optional setting to hide a panel when 600px <= width < 960px. (Default: '')
  * `hide-xs` - Optional setting to hide a panel when width < 600px. (Default: '')
  * 'width' = Optional setting of the width (Default: '')
  * `options` - An optional object used to pass configuration values to the directive. Each value can be referenced from within that directive's isolate scope.

##Dictionary of Terms

<dl id="data">
  <dt>data</dt>
  <dd>Type: "object" </br>
      Description: This object is optional and contains any additional data to pass as route information. Default: "rolesRequired": ["user","staff","admin"]</dd>
</dl>

<dl id="Filter">
  <dt>Filter</dt>
  <dd>Type: "object" </br>
      Description: This object contains all of the filters for this dashboard.</dd>
</dl>

<dl id="layout">
  <dt>layout</dt>
  <dd>Type: "object" </br>
      Description: This object tells the dashboard service where to place the panels.</dd>
</dl>

<dl id="name">
  <dt>name</dt>
  <dd>Type: "string" </br>
      Description: This string is the unique name for the 'dashboard.uion' file. It will be used as the key for the 'dashboard.uion'.</dd>
</dl>

<dl id="panels">
  <dt>panels (dashboards.myDashboard.panels)</dt>
  <dd>Type: "object" </br>
      Description: This object is a dictionary of UI panel configuration. The panels are the UI elements that when put together constitute a dashboard.<br>
      Examples:
      <ul>
          <li>"instrumentPanel" : For an instrumentation dashboard. Shows either a grid or tile view of a collection of instruments.</li>
          <li>"Filter" : For any dashboard. Contains a search bar and a collection of checkboxes so the user can narrow down a list of results.</li>
      </ul>
  </dd>
</dl>

<dl id="layout.panels">
  <dt>panels (dashboard.myDashboard.layout.panels)</dt>
  <dd>Type: "array of objects" </br>
      Description: Each element in this array represents a UI element.</dd>
</dl>

<dl id="layout.panels.panels">
  <dt>panels (dashboard.myDashboard.layout.panels.panels)</dt>
  <dd>Type: "array" </br>
      Description: This is the name of the specific panel that you would like to appear in the dashboard.</dd>
</dl>

<dl id="route">
  <dt>route</dt>
  <dd>Type: "string" </br>
      Description: This text is optional. This is the route to use for the dashboard. If specified, the state will be automatically generated for you with the specified dashboard configuration.</dd>
</dl>

<dl id="title">
  <dt>title</dt>
  <dd>Type: "string" </br>
      Description: This text that will appear towards the top of the dashboard. This is usually the list's name but it does not have to be. </dd>
</dl>






















