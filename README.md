#Scheduling Instruments Dashboard List Settings Configuration

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

##Keys Defined
        "dashboards" : {
            "myInstruments": {                                                                       // Name your dashboard what ever name you like. Should describe the dashboad.
              "name": {…},
              "title": {…},
              "route": {…},
              "data": {…},
              "panels": {
                   "searchPanel" : {...},
                   "instrumentPanel" : {...},
                   "Filter" : {...},
                   "calendarPanel" : {
                        "title" : "Calendar",
                        "type" : "ls-schedule",
                        "options" : {
                             "calendarView" : {
                                  "list" : {
                                       "listName" : "Reservations",
                                       "viewName" : "All Events",
                                       "startTimeLabelName" : "EventDate",
                                       "endTimeLabelName" : "EndDate",
                                       "allDayLabelName" : "All Day Event"
                                  },
                                  "groupLabelName" : "Instrument",
                                  "defaultCalendarView" : "timelineThreeDays",
                                  "minTime" : 08:00,
                                  "maxTime" : 19:00,
                                  "height" : 900,
                                  "cellHeight" : (empty)
                             },
                             "resourceList" : {
                                  "listName" : "Instruments",
                                  "viewName" : "myView"
                             },
                             "resourceLabelText" : "Instruments",
                             "modal" : {
                                  "type" : "SP",
                                  "host" : "http://ort.ncats.nih.gov",
                                  "newEvent" : {
                                       "pathname" : 
                                            "/instrumentation/Lists/Reservations/NewForm.aspx"
                                  },
                                  "viewEvent" : {
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
