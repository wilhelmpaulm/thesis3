<br>
<div class=" btn-group-sm " role="tablist">
    <a class="active btn btn-primary" href="#main" role="tab" data-toggle="tab">main</a>
    <a  class="btn btn-primary hide" id="subheading" href="#sub" role="tab" data-toggle="tab">sub</a>
    <a  class="btn btn-primary pull-right" href="#search" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-search"></i></a>
</div>
<br>
<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="main">
        <ul class="sidebar-menu f-osb">

            
            <li>
                <a href="{{URL::to("agent/dashboard")}}" class=""><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{URL::to("agent/calendar")}}" class=""><i class="fa fa-calendar"></i> Calendar</a>
            </li>
            <li>
                <a href="{{URL::to("agent/messages")}}" class=""><i class="fa fa-envelope"></i> Messages</a>
            </li>
            <li>
                <a href="{{URL::to("agent/agents")}}" class=""><i class="fa fa-shield"></i> Employees</a>
            </li>
            <li>
                <a href="{{URL::to("agent/clients")}}" class=""><i class="fa fa-users"></i> Clients</a>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Cases</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to("agent/cases-list")}}"  style=""><i class="fa fa-angle-double-right"></i> Case List</a></li>
                    <li> <a href="{{URL::to("agent/cases-add")}}" style=""><i class="fa fa-angle-double-right"></i> Add Complaint</a></li>
                    <!--<li> <a href="{{URL::to("agent/cases-assign")}}" style=""><i class="fa fa-angle-double-right"></i> Assign</a></li>-->
                    <li> <a href="{{URL::to("agent/cases-ongoing")}}" style=""><i class="fa fa-angle-double-right"></i> Ongoing</a></li>
                    <li><a href="{{URL::to("agent/cases-closed")}}"  style=""><i class="fa fa-angle-double-right"></i> Closed</a></li>
                    <li><a href="{{URL::to("agent/cases-non-viable")}}" style=""><i class="fa fa-angle-double-right"></i> Non-viable</a></li>
                    <li><a href="{{URL::to("agent/agent-case-timeline")}}" style=""><i class="fa fa-angle-double-right"></i> Case Timeline</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Resources</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to("agent/resources-list")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Resource List</a></li>
                    <li>    <a href="{{URL::to("agent/resources-request")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Request</a></li>
                    <!--<li>     <a href="{{URL::to("agent/resources-approval")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Approve</a></li>-->
                    <li>  <a href="{{URL::to("agent/resources-current")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Current / History</a></li>
                </ul>
            </li>


            <li class="treeview ">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Reports</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to("form_cases/annual")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Case Count</a></li>
                    <li><a href="{{URL::to("form_cases/monthly")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Case Progress</a></li>
                    <li><a href="{{URL::to("agent/reports-agents")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Agents</a></li>
                    <li> <a href="{{URL::to("agent/reports-complaints")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Cases</a></li>
                    <li><a href="{{URL::to("agent/reports-trends")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Trends</a></li>
                    <li> <a href="{{URL::to("agent/reports-demographics")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Victim Demographics</a></li>
                    <li><a href="{{URL::to("agent/reports-demographics-subjects")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Subject Demographics</a></li>
                    <li><a href="{{URL::to("agent/reports-locations")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Locations</a></li>
                    <li> <a href="{{URL::to("agent/reports-case-timeline-comparison")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Timeline Comparison</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to("agent/form-list")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Form List</a></li>
                    <li> <a href="{{URL::to("agent/form-subpoena")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Subpoena</a></li>
                    <li><a href="{{URL::to("agent/form-coordination")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Coordination</a></li>
                    <li><a href="{{URL::to("agent/form-disposition")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Disposition</a></li>
                    <li><a href="{{URL::to("agent/form-transmital")}}" class="" style=""><i class="fa fa-angle-double-right"></i> Transmittal</a></li>                        
                </ul>
            </li>

        </ul>

    </div>
    <div class="tab-pane" id="sub">...</div>
    <div class="tab-pane c-white" id="search">
        <form action="{{URL::to('search')}}" method="post">
            <label>Table</label>
            <select name="table" class="form-control">
                <option value="all">All</option>
                <option value="evidence_documents">Documents</option>
                <option value="evidence_pictures">Pictures</option>
                <option value="evidence_videos">Videos</option>
                <option value="evidence_objects">Objects</option>
                <option value="evidence_recordings">Recordings</option>
                <option value="kases">Cases</option>
                <option value="case_observations">Findings</option>
            </select>
            <label>Date</label>
            <select name="ton" class="form-control">
                <option value="on">ON</option>
                <option value="off">OFF</option>
            </select>
            
            
            <label>Start Date</label>
            <input class="form-control" type="date" name="" value="date_start" />
            <label>End Date</label>
            <input class="form-control" type="date" name="" value="date_end" />
           <br>
            <span class="btn-group btn-group-sm pull-right">
            <button class="btn btn-primary">Submit</button>
            </span>
        </form>
    </div>
</div>
