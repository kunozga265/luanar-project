<x-app-layout>
    <div class="event-details-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar-widget">
                        <div class="single-sidebar-widget" style="margin:0">
                            <h4 class="title">Important information.</h4>
                            <div class="recent-content" style="border: solid 1px aqua">
                                <ul>
                                    <li
                                        style="padding: 7px; border-bottom: solid 1px aqua"
                                        >

                                        <a href="{{route('home')}}">
                                            <b> <i class="mdi mdi-chevron-right"></i> About Research</b>
                                        </a>

                                    </li>

                                    <li style="padding: 7px; border-bottom: solid 1px aqua; background:#2621ff;" ><a href="{{route('publications')}}"><b style="color: #FFFAFA"> <i class="mdi mdi-chevron-right"></i> Publications</b></a></li>
                                    <li style="padding: 7px; border-bottom: solid 1px aqua"><a href="{{route('datasets')}}"><b> <i class="mdi mdi-chevron-right"></i> Datasets</b></a></li>
                                    <li style="padding: 7px; border-bottom: solid 1px aqua"><a href="#"><b> <i class="mdi mdi-chevron-right"></i> Patents</b></a></li>
                                    <li style="padding: 7px; border-bottom: solid 1px aqua"><a href="#"><b> <i class="mdi mdi-chevron-right"></i> Staff</b></a></li>
                                    <li style="padding: 7px; border-bottom: solid 1px aqua"><a href="#"><b> <i class="mdi mdi-chevron-right"></i> Researchers</b></a></li>
                                    <li style="padding: 7px; border-bottom: solid 1px aqua"><a href="#"><b> <i class="mdi mdi-chevron-right"></i> Agriculture Directorate</b></a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="single-sidebar-widget" style="margin:0">

                            <div class="single-item" style="margin-top:20px">
                                <div style="padding: 20px 0">
                                    <h4 style="color: #98a560;">Filter by Keywords</h4>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Journals</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Books</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Research Papers</p>
                                    <p style="font-size:12px; text-align: right; margin: 0; font-weight: bolder; color: #2e86ac; text-transform: uppercase">Show More <i class="mdi mdi-chevron-right"></i></p>
                                </div>

                            </div>
                        </div>
                        <div class="single-sidebar-widget" style="margin:0">

                            <div class="single-item" style="margin-top:20px">
                                <div style="padding: 20px 0">
                                    <h4 style="color: #98a560;">Filter by Programs</h4>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Crops</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Livestock</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Nutrition and Food Science</p>
                                    <p style="font-size:12px; text-align: right; margin: 0; font-weight: bolder; color: #2e86ac; text-transform: uppercase">Show More <i class="mdi mdi-chevron-right"></i></p>
                                </div>

                            </div>
                        </div>
                        <div class="single-sidebar-widget" style="margin:0">

                            <div class="single-item" style="margin-top:20px">
                                <div style="padding: 20px 0">
                                    <h4 style="color: #98a560;">Filter by Topics</h4>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Food Security</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Livestock</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Animal Health</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Value Chain Analysis</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Food Policy Analysis</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Plant Breeding</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Irrigation</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Biotechnology</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Economic Development</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Government Subsidy</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Agricultural Engineering</p>
                                    <p style="margin: 8px 0; font-weight: bolder; color: #2e86ac;">Nutrition and Diet</p>
                                    <p style="font-size:12px; text-align: right; margin: 0; font-weight: bolder; color: #2e86ac; text-transform: uppercase">Show More <i class="mdi mdi-chevron-right"></i></p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-9">

                    <div class="event-details-content">
                        <div class="single-event-item" style="padding:0">
                            <div class="single-event-image" style="border-bottom: 1px solid #e1e1e1;">
                                <div style="padding: 40px 40px">
                                    <h4 style="color: #98a560;">Search</h4>

                                    <div class="" style="margin-top: 16px">

                                        <label for="keywords" class="form-group" style="margin-bottom: 8px">By Keywords</label>
                                        <div style="position: relative">
                                            <i style="position: absolute; right: 5px; color: #98a560; font-size: 16px; z-index: 1; padding: 8px;" class="fa fa-search"></i>
                                            <input type="text" id="keywords" name="keywords" class="form-control" style="position: relative; padding-right: 35px;">
                                        </div>

                                    </div>

                                    <div class="" style="margin-top: 16px">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="authors" class="form-group" style="margin-bottom: 8px">By Authors</label>
                                                <input type="text" id="authors" name="authors" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="type" class="form-group" style="margin-bottom: 8px">Type Of</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option value="type_1">Type 1</option>
                                                    <option value="type_2">Type 2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="sort" class="form-group" style="margin-bottom: 8px">Sort By</label>
                                                <select name="sort" id="authors" class="form-control">
                                                    <option value="date">Date</option>
                                                    <option value="alphabetical">Alphabetical</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="single-event-text" style="padding:0; background-color: white">

                                <div style="padding: 40px 40px">
                                    <p>All past and present publications from research and projects funded by CABMACC or a through PCO, can be accessed from this page.</p>
                                    <p>Progress reports for CABMACC and Infrastructure Programmes (IDP)</p>
                                    <ul style="padding-left: 20px; margin-bottom: 24px">
                                        <li style="list-style: disc">IDP Progress Report for 2017 to 2018</li>
                                        <li style="list-style: disc">2016 Progress Report for IDP</li>
                                        <li style="list-style: disc">2016 Progress Report for CABMACC</li>
                                        <li style="list-style: disc">CABMACC Progress Report 25 Sept 2016</li>
                                        <li style="list-style: disc">2015 IDP Annual Progress Report Final Submitted to DNE - Aug 2015</li>
                                        <li style="list-style: disc">CABMACC Annual Progress Report 2015</li>
                                    </ul>

                                    <p>Articles</p>
                                     <ul style="padding-left: 20px; margin-bottom: 24px">
                                        <li style="list-style: disc">Tapp Newsletter March 2016</li>
                                        <li style="list-style: disc">MATANDS Issue 1 - December 2017</li>
                                    </ul>

                                    <p>Articles/publications by PhD/MSc students sponsored by CABMACC Programme</p>
                                     <ul style="padding-left: 20px; margin-bottom: 24px">
                                        <li style="list-style: disc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                        <li style="list-style: disc">Nullam malesuada turpis sit amet ante viverra eleifend.</li>
                                        <li style="list-style: disc">In a eros non tortor ultrices ornare.</li>
                                        <li style="list-style: disc">Integer lobortis nunc nec laoreet tincidunt.</li>
                                        <li style="list-style: disc">Donec et libero in augue sollicitudin blandit.</li>
                                        <li style="list-style: disc">Aliquam porttitor libero rutrum tortor euismod cursus.</li>
                                        <li style="list-style: disc">Suspendisse vel nulla aliquam, porta dolor eu, mollis sem.</li>
                                        <li style="list-style: disc">Aenean eu mi sit amet mi molestie tristique.</li>
                                        <li style="list-style: disc">Nam porttitor mi quis velit facilisis, ac vulputate arcu placerat.</li>
                                        <li style="list-style: disc">Phasellus pretium ipsum vel neque malesuada fermentum.</li>
                                        <li style="list-style: disc">Mauris auctor arcu id arcu convallis, in imperdiet velit dignissim.</li>
                                        <li style="list-style: disc">Nam pharetra dui et ante fringilla, et semper tellus maximus.</li>
                                        <li style="list-style: disc">Praesent interdum magna eget porttitor vestibulum.</li>
                                        <li style="list-style: disc">Sed quis sem laoreet, interdum odio sit amet, accumsan felis.</li>
                                        <li style="list-style: disc">Integer ut massa eu massa euismod vehicula.</li>
                                        <li style="list-style: disc">In elementum lacus a ultrices facilisis.</li>
                                        <li style="list-style: disc">Aliquam quis quam in erat aliquet faucibus id nec augue.</li>
                                        <li style="list-style: disc">Curabitur a arcu gravida, sollicitudin mi ut, interdum quam.</li>
                                        <li style="list-style: disc">Suspendisse bibendum nulla convallis erat feugiat, eget elementum leo egestas.</li>
                                        <li style="list-style: disc">Nullam porta ante in justo egestas, consectetur suscipit turpis dapibus.</li>
                                        <li style="list-style: disc">In suscipit tortor sit amet tortor placerat, sed tincidunt ante posuere.</li>
                                        <li style="list-style: disc">In molestie dolor facilisis est cursus auctor et eu risus.</li>
                                        <li style="list-style: disc">Fusce sed purus dignissim, scelerisque tortor sed, lacinia dolor.</li>
                                        <li style="list-style: disc">Pellentesque volutpat turpis a nunc cursus, id euismod nisl tempor.</li>
                                        <li style="list-style: disc">Vestibulum at augue eget nisi gravida dapibus.</li>
                                        <li style="list-style: disc">Duis id elit sed mauris finibus interdum.</li>
                                        <li style="list-style: disc">Mauris tincidunt dolor eget est auctor, ac eleifend purus vulputate.</li>
                                        <li style="list-style: disc">Vestibulum gravida enim at consequat sagittis.</li>
                                        <li style="list-style: disc">Pellentesque in nulla dictum purus condimentum congue eget vel mi.</li>
                                        <li style="list-style: disc">Vivamus bibendum nulla iaculis quam pretium, eu facilisis metus bibendum.</li>
                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
