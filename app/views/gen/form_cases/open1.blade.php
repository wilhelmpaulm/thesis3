<?php

?>
<div class="row ">

    <div class="col-lg-12">
        <div class="panel panel-black">
            <div class="panel-heading">
                <h3 class="panel-title">Case Details</h3>
            </div>
            <form action="{{URL::to("/form_cases/monthly")}}" method="post">
                <div class="panel-body">
                    <!--<h5>Select Agent</h5>-->

                    <label ><span class="c-red">*</span>Agents</label>
                    <select name="agent_id" class="form-control">
                        @foreach($agents as $a)
                        <option value="{{$a->id}}">{{$a->rank}} - {{$a->last_name}}, {{$a->first_name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <label ><span class="c-red">*</span>From</label>
                    <select name="y1" class="form-control">
                        
                        <option >1990</option>
                        <option >1991</option>
                        <option >1992</option>
                        <option >1993</option>
                        <option >1994</option>
                        <option >1995</option>
                        <option >1996</option>
                        <option >1997</option>
                        <option >1998</option>
                        <option >1999</option>
                        <option >2000</option>
                        <option >2001</option>
                        <option >2002</option>
                        <option >2003</option>
                        <option >2004</option>
                        <option >2005</option>
                        <option >2006</option>
                        <option >2007</option>
                        <option >2008</option>
                        <option >2009</option>
                        <option >2010</option>
                        <option >2011</option>
                        <option >2012</option>
                        <option >2013</option>
                        <option  >2014</option>
                       
                    </select>
                    
                    <label ><span class="c-red">*</span>To</label>
                    <select name="y2" class="form-control">
                        
                        <option >1990</option>
                        <option >1991</option>
                        <option >1992</option>
                        <option >1993</option>
                        <option >1994</option>
                        <option >1995</option>
                        <option >1996</option>
                        <option >1997</option>
                        <option >1998</option>
                        <option >1999</option>
                         <option >2000</option>
                        <option >2001</option>
                        <option >2002</option>
                        <option >2003</option>
                        <option >2004</option>
                        <option >2005</option>
                        <option >2006</option>
                        <option >2007</option>
                        <option >2008</option>
                        <option >2009</option>
                        <option >2010</option>
                        <option >2011</option>
                        <option >2012</option>
                        <option >2013</option>
                        <option  >2014</option>
                       
                    </select>
                </div>
                <div class="panel-footer clearfix">
                    <span class="btn-group btn-group-sm pull-right">
                        <button class="btn btn-primary" type="">Submit</button>
                    </span>
                </div>
            </form>
        </div>
    </div>



</div>
