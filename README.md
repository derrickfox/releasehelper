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

##Steps for setting up an instrument scheduler:

1. Create a "Reservations" list with the following columns: 
    1. "EventDate" : Date and Time : Stores the date and time of the reservation's start.
    2. "Function" : Choice : A "function" is a reason for reserving an instrument. Example) "Assisted Run", "Maintenance", "Primary Screen", ect.
    3. "Instrument" : Lookup : This is the name of the instrument being reserved. This column looks-up the "Title" field from the "Instruments" list.
    4. "InstrumentID" : Single line of text : This is the unique ID number that SharePoint assigns to each instrument in the "Instruments" list. Used to identify the specific instrument that is being reserved.
    5. "Lab" : Single line of text : This is the specific laboratory, division, or group that this reservation is for.
    6. "LabPI" : Person or Group : This is the specific individual for whom the reservation was made. This can either be the user who made the reservation or a different user.
    7. "Project" : Lookup: This is an optional field. This associates the reservation to a specific project. This looks up the "Project Title" field in the "Projects" list.
    8. "ProjectID" : Single line of text : This is the specific ID that SharePoint assigns to each project in the "Projects" list. This is used to link a project to a reservation. 
2. Add the following columns to the "Instruments" list:
    1. "Advance Reserve" : Number : This number indicates how many "Advance Reserve Units" the user can schedule a reservation from the present moment. Example) If the "Advance Reserve Unit" is "Weeks" and the "Advance Reserve" value is "2", then the user can schedule this instrument as far out as 2 weeks from now.
    2. "Advance Reserve Unit" : Choice : This is a list of units of time. The choices are "Days" and "Weeks".
    3. "Allow Off-hours" : Yes/No : This is a boolean value that determines whether or not a user can make a reservation out side of the normal time frame. When the value is "No" the "Normal Start Time" and "Normal End Time" values are ignored.
    4. "Allow User Reservations" : Yes/No : This is a boolean value that determines whether or not a user can make a reservation with out approval.
    5. "Allow Weekends" : Yes/No : This is a boolean value that determines whether or not the user can schedule a reservation that lands on a weekend.
    6. "Cancellation Deadline" : Number : This value is the number of "Advance Reserve Units" that the user will need to cancel a reservation by. Example) If this value is "1" and the "Advance Reserve Unit" value is "Days", then if the user wishes to cancel this reservation they will need to do so 1 day before it is scheduled to begin.
    7. "Display Slot Size" : Number : This value is the number of minutes each calendar cell represents. Example) If the value is "30" then each calendar cell represents a 30 minute timeframe.
    8. "Maximum Slot Size" : Number :
    9. "Minimum Slot Size" : Number :
    10. "Normal Start Time" : Date and Time : This is the date and time that the reservation will begin.
    11. "Normal End Time" : Date and Time : This is the date and time that the reservation will end.
    12. "Reservation List" : Single line of text : This is the internal name of the SharePoint list where the reservations will be saved and retrieved. 
    13. "Reservation Deadline" : Number : 
    14. "Show Reservations to Users" : Yes/No : This is a boolean value that determines whether or not the user will be shown the reservations.
    15. "User Requests" : Yes/No : This is a boolean value that determines whether or not the user can schedule reservations directly themselves. If the value is "Yes" then the user is free to schedule a reservation without approval. If the value is "No" then an approval email is generated.
3.  Create a "Functions" list with the following columns:
    1. "Title" : Single line of text : This is the name of the function (reason for reserving) for this instrument. Example) "Assisted Run", "Unassisted Run", "Maintenance", ect.
    2. "Auto Approve" : Yes/No : This is a boolean value that determines whether or not the reservation will be approved and post to the calendar-view automatically.
    3. "Display Cost" : Yes/No : This is a boolean value that determines whether or not the user will see the cost associated with this reservation.
    4. "User Selectable" " Yes/No : This is a boolean value that determines whether or not the user can click choose a specific function to associate with this reservation. 
    5. "Instrument" : Lookup : This is the name of the instrument that is being reserved. This looks-up the "Title" field from the "Instruments" list.
4.  Create a "Lab Users" list if it does not yet exist on your site. If it already exists then make sure it has the following columns:
    1. "First Name" : Single line of text : This is the first name of the person making the reservation.
    2. "Last Name" : Single line of text : This is the last name of the person making the reservation.
    3. "UserName" : Person or Group : This is the user name of the person making the reservation. In the "Show field" option for this column make sure "User name" is selected from the drop down menu. 
    4. "DisplayName" : Person or Group : This is the display name of the person making the reservation. In the "Show field" option for this column make sure "Name" is selected from the drop down menu. 
    5. "UserEmail" : Person or Group : This is the email address of the person making the reservation. In the "Show field" option for this column make sure "Name (with presence)" is selected from the drop down menu.
    6. "LabPI" : Person or Group : This is the principal investigator of the person making the reservation.
    7. "User Level" : Choice : This is a list of user levels. The options are "Beginner", "Intermediate", and "Advanced".
    8. "Registration Date" : Date and Time : The date that the user registered to schedule instruments.


##Calendar Dashboard's List Settings Configuration

You need to configure two seperate lists' list settings: "Instruments" and "Reservations".

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
                                       "siteID" : (Optional, used in cross-domain request)            // This is the site ID where the APIs can be found to make this panel function correctly. This is typically used when you would like to enable scheduling on a site other than ORT (where the APIs reside) but you do not want the user to be taken to an ORT site. Example) "ort"
                                       "facilityPath" : (Optional, used in cross-domain request)      // This is the facility where the APIs can be found to make this panel function correctly. This is typically used when you would like to enable scheduling on a site other than ORT (where the APIs reside) but you do not want the user to be taken to an ORT site. Example) "/instrumentation"
                                  },
                                  "apiPath" : (Optional, used in cross-domain request),               // This is the path where the APIs can be found to make this panel function correctly. This is typically used when you would like to enable scheduling on a site other than ORT (where the APIs reside) but you do not want the user to be taken to an ORT site. Example) "/facility/list/:listName/view/:view"
                                  "groupLabelName" : "Instrument",                                    // This is the label name in the current list (value of options.calendarView.listName), which used to group the events/reservations on the calendar by different colors.
                                  "defaultCalendarView" : "timelineThreeDays",                        // This determines the default view for the calendar panel. The options are "timelineDay", "timelineThreeDays", "agendaWeek", and "month".
                                  "minTime" : 08:00,                                                  // The earliest time of the day to which a user can make a reservation.
                                  "maxTime" : 19:00,                                                  // The latest time of the day to which a user can make a reservation.
                                  "height" : 900,                                                     // The amount of pixels each instrument-row will be. Do not put "px" at the end.
                                  "cellHeight" : (empty)                                              // Sets the height in pixel for each cell on calendar for all views.
                             },
                             "resourceList" : {                                                       // This is the panel to the left of the calendar-view. This is a list of instruments where each row is an individual instrument.
                                  "listName" : "Instruments",                                         // This is the internal name of the SharePoint list that will be used to populate the list of instruments featured in the calendar panel.
                                  "viewName" : "myView",                                              // The specific view within the SharePoint list that will be used to populate the calendar panel.
                                  "siteID" : (Optional, used in cross-domain request)                 // This is the site ID where the APIs can be found to make this panel function correctly. This is typically used when you would like to enable scheduling on a site other than ORT (where the APIs reside) but you do not want the user to be taken to an ORT site. Example) "ort"
                                  "facilityPath" : (Optional, used in cross-domain request)           // This is the facility where the APIs can be found to make this panel function correctly. This is typically used when you would like to enable scheduling on a site other than ORT (where the APIs reside) but you do not want the user to be taken to an ORT site. Example) "/instrumentation"
                                  "apiPath" : (Optional, used in cross-domain request)                // This is the path where the APIs can be found to make this panel function correctly. This is typically used when you would like to enable scheduling on a site other than ORT (where the APIs reside) but you do not want the user to be taken to an ORT site. Example) "/facility/list/:listName/view/:view"
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
        
### Setting up the filter for the calendar panel
- Input `calendarPanel` into the `refPanelId` array
```JSON
 "Filter": {
      "title": "Filter",
      "type": "ls-filter",
      "options": {
      "refPanelId": [
           "calendarPanel"
      ],
      "groupByList": [
           {...},
           {...}
      ],
 }
```
