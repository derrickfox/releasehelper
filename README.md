#Scheduling Instrumentation Setup Guide 

A scheduling instruments dashboard is a more specific version of a <a href="https://github.com/LabShare/facility/blob/master/docs/dashboard-readme.md">LabShare dashboard</a>. These dashboards tend to follow similar layout and styling. 
The typical elements of an scheduling instruments dashboard are as follows:

1.  Filter on the left side.
    1.   This filter usually offers the user options to filter on equipment type, location, and division.
    2.   There is typically a search bar on the top of the filter.
2.  List of instruments.
    1.   The instruments are presented to the user in a list-view.
3.  Calendar view.
    1.   This section has three layout options: "day", "3 days", "week", and "month".
    * "day" : Each instrument is represented by a row (y-axis). User selects a time from the calendar grid's column (x-axis).
    * "3 days" : Each instrument is represented by a row (y-axis). User selects a time from the calendar grid's column (x-axis).
    * "week" : Each hour is a represented by a row (y-axis) and the columns are the days (x-axis). User selects the instrument and times from the resulting form. 
    * "month" : Each day is a cell in this traditional calendar view. User selects the instrument and times from the resulting form.
4.  Title of the dashboard on the top of the calendar view. 

##Calendar Dashboard's List Settings Configuration

Instruments list's settings : `<host URL>/_layouts/ls/<release version>/debug/default.aspx#/facility/list/<instruments list name>/settings` 

        "dashboards" : {
            "mySchedule": {                                                                            // Name your dashboard what ever name you like. Should describe the dashboard.
              "name": {…},
              "title": {…},
              "route": {…},
              "data": {…},
              "panels": {
                   "searchPanel" : {...},
                   "instrumentPanel" : {...},
                   "Filter" : {...},
                   "calendarPanel" : {                                                                // This panel is required. It is what differenciates a scheduling dashboard from any other type of dashboard.
                        "title" : "Calendar",                                                         // This is the text that will appear on the top of the dashboard.
                        "type" : "ls-schedule",                                                       // Tells the page which LabShare directive will be used.
                        "options" : {
                             "calendarView" : {                                                       // Defines the properties of how the calendar view will be displayed to the user.
                                  "list" : {
                                       "listName" : "Reservations",                                   // This is the internal name of the SharePoint list where the reservations will be saved and retrived. 
                                       "viewName" : "All Events",                                     // This is the specific name of the view in your list. Different views will contain different content.
                                       "startTimeLabelName" : "EventDate",                            // Internal name of the column from the SharePoint list. Stores the date and time of the reservation's start time. 
                                       "endTimeLabelName" : "EndDate",                                // Internal name of the column from the SharePoint list. Stores the date and time of the reservation's end time. 
                                       "allDayLabelName" : "All Day Event"                            // Internal name of the column from the SharePoint list that stores the boolean value of whether or not the reservation is an all day event.
                                  },
                                  "groupLabelName" : "Instrument",                                    //
                                  "defaultCalendarView" : "timelineThreeDays",                        // This determines the default view for the calendar panel.
                                  "minTime" : 08:00,                                                  // The earliest time of the day to which a user can make a reservation.
                                  "maxTime" : 19:00,                                                  // The latest time of the day to which a user can make a reservation.
                                  "height" : 900,                                                     // The amount of pixels each instrument-row will be.
                                  "cellHeight" : (empty)                                              // 
                             },
                             "resourceList" : {
                                  "listName" : "Instruments",                                         // This is the internal name of the SharePoint list that will be used to populate the list of instruments featured in the calendar panel.
                                  "viewName" : "myView"                                               // The specific view within the SharePoint list that will be used to populate the calendar panel.
                             },
                             "resourceLabelText" : "Instruments",                                     // 
                             "modal" : {
                                  "type" : "SP",                                                      // This is the type of form that will populate when the user makes a reservation. "SP" will populate the AxleLabs version of the form. "form2" will populate the AngularJS version of the form.
                                  "host" : "http://ort.ncats.nih.gov",                                // This is the host that hosts the directives need to make the functionality work properly.
                                  "newEvent" : {                                                      // This points to the "new form" that should be used for this scheduler.
                                       "pathname" : 
                                            "/instrumentation/Lists/Reservations/NewForm.aspx"
                                  },
                                  "viewEvent" : {                                                     // This points to the "view/edit form" that should be used for this scheduler.
                                       "pathname" : 
                                            "/instrumentation/Lists/Reservations/DispForm.aspx"
                                  }
                             }
                        }
                   }
              },
              "layout" : {...}
        },
        "forms" : {...} 
