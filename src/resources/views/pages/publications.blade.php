<x-app-layout>
    <div class="event-details-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar-widget">
                        <div class="single-sidebar-widget" style="margin:0">
                            <h4 class="title">About Research at Luanar.</h4>
                           {{-- <div class="recent-content" style="border: solid 1px aqua">
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

                            </div>--}}
                            <div class="recent-content-section">
                                <p><a href="{{route('publications')}}" class="active">Publications</a></p>
                                <p><a href="{{route('datasets')}}">Datasets</a></p>
                                <p><a href="#">Patents</a></p>
                                <p><a href="#">Staff</a></p>
                                <p><a href="#">Researchers</a></p>
                                <p><a href="#">Agriculture Directorate</a></p>
                            </div>
                        </div>
                        <div class="single-sidebar-widget" style="margin:0">

                            <div class="single-item" style="margin-top:20px">
                                <div class="filter">
                                    <h4>Filter by Keywords</h4>
                                    <p><a href="#">Journals</a></p>
                                    <p><a href="#">Books</a></p>
                                    <p><a href="#">Research Papers</a></p>
                                    <p  class="show-more"><a href="#">SHOW MORE</a> <i class="mdi mdi-chevron-right"></i></p>
                                </div>

                            </div>
                        </div>
                        <div class="single-sidebar-widget" style="margin:0">

                            <div class="single-item" style="margin-top:20px">
                                <div class="filter">
                                    <h4>Filter by Programs</h4>
                                    <p><a href="#">Crops</a></p>
                                    <p><a href="#">Livestock</a></p>
                                    <p><a href="#">Nutrition and Food Science</a></p>
                                    <p  class="show-more"><a href="#">SHOW MORE</a> <i class="mdi mdi-chevron-right"></i></p>
                                </div>

                            </div>
                        </div>
                        <div class="single-sidebar-widget" style="margin:0">

                            <div class="single-item" style="margin-top:20px">
                                <div class="filter">
                                    <h4>Filter by Topics</h4>
                                    <p><a href="#">Food Security</a></p>
                                    <p><a href="#">Livestock</a></p>
                                    <p><a href="#">Animal Health</a></p>
                                    <p><a href="#">Value Chain Analysis</a></p>
                                    <p><a href="#">Food Policy Analysis</a></p>
                                    <p><a href="#">Plant Breeding</a></p>
                                    <p><a href="#">Irrigation</a></p>
                                    <p><a href="#">Biotechnology</a></p>
                                    <p><a href="#">Economic Development</a></p>
                                    <p><a href="#">Government Subsidy</a></p>
                                    <p><a href="#">Agricultural Engineering</a></p>
                                    <p><a href="#">Nutrition and Diet</a></p>
                                    <p  class="show-more"><a href="#">SHOW MORE</a> <i class="mdi mdi-chevron-right"></i></p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-9">

                    <div class="event-details-content">
                        <div class="single-event-item" style="padding:0">
                            <div class="single-event-image" style="border-bottom: 1px solid #e1e1e1;">
                                <div class="searchSection">
                                    <h4>Search</h4>

                                    <div class="search-field">

                                        <label for="keywords" class="form-group">By Keywords</label>
                                        <div class="field">
                                            <i style="" class="fa fa-search"></i>
                                            <input type="text" id="keywords" name="keywords" class="form-control" style="">
                                        </div>

                                    </div>

                                    <div class="search-filters">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="authors" class="form-group">By Authors</label>
                                                <input type="text" id="authors" name="authors" class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <label for="type" class="form-group">Type Of</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option value="type_1">Type 1</option>
                                                    <option value="type_2">Type 2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <label for="sort" class="form-group">Sort By</label>
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

                                <div class="listing">
                                    <p>All past and present publications from research and projects funded by CABMACC or any through PCO, can be accessed from this page.</p>
                                    <p>
                                        <b>Progress reports for CABMACC and Infrastructure Programmes (IDP)</b>
                                    </p>
                                    <ul>
                                        <li><a href="https://luanar.ac.mw/pco2/downloads/IDP%20Progress%20Report%20for%202017%20to%202018%20Revised%2018.08.2018.pdf">IDP Progress Report for 2017 to 2018 Revised 18.08.2018</a></li>
                                        <li><a href="https://luanar.ac.mw/pco2/downloads/2016%20-%2017%20Progress%20Report%20for%20IDP.pdf">2016 - 17 Progress Report for IDP</a></li>
                                        <li><a href="https://luanar.ac.mw/pco2/downloads/2016-17%20Progress%20report%20for%20CABMACC.pdf">2016-17 Progress report for CABMACC</a></li>
                                        <li><a href="https://luanar.ac.mw/pco2/downloads/CABMACC%20Progress%20Report%2025%20Sept%202016.pdf">CABMACC Progress Report 25 Sept 2016</a></li>
                                        <li><a href="https://luanar.ac.mw/pco2/downloads/2015%20IDP%20Annual%20Progress%20Report%20-%20Final%20submitted%20to%20RNE%20-%2017%20Aug%202015.pdf">2015 IDP Annual Progress Report - Final submitted to RNE - 17 Aug 2015</a></li>
                                        <li><a href="https://luanar.ac.mw/pco2/downloads/CABMACC%20Annual%20Progress%20Report%202014-15%20Final%20050815.pdf">CABMACC Annual Progress Report 2014-15 Final 050815</a></li>

                                    </ul>

                                    <p>Articles</p>
                                     <ul>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Tapp%20Newsletter.pdf">Tapp Newsletter (January-March,2016)</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/MAJANDS%20Vol%201%20Issue%201.pdf">MAJANDS Vol 1 Issue 1 (1 December 2015)</a></li>
                                    </ul>

                                    <p>
                                        <b>Articles/publications by PhD/MSc students sponsored by CABMACC Programme.</b>
                                    </p>
                                     <ul>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Cleaner%20Cooking%20Camp%202018%20pptx.pdf"><b>Experencia Madalitso Jalasi (2018) - presentation:</b> Investigating and Expanding Learning across  Activity System Boundaries in Improved Cook Stove  Innovation Diffusion and Adoption in Malawi</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Experencia%20Jalasi%20final%20thesis.pdf"><b>Experencia Madalitso Jalasi (2018) - Dissertation</b>:  Investigating and Expanding Learning across  Activity System Boundaries in Improved Cook Stove  Innovation Diffusion and Adoption in Malawi </a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Geresomu%20Targeted%20Training%20Paper.pdf">Geresomo, et al  (2018): Targeting caregivers with context specific behavior change training </a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Kabambe%20-%20Productivity%20of%20pigeon%20pea%20and%20maize%20rotation%20system.pdf">Kabambe, et al(2018): Productivity of pigeon pea and maize rotation system in Balaka District</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Kabambe%20-%20Productivity%20and%20profitability%20on%20groundnut%20and%20maize.pdf">Kabambe, et al(2018) : Productivity and profitability on groundnut and maize</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Makwiza_Dissertation%20-%20Estimating%20outdoor%20water%20use%20allowing%20for%20the%20possible%20impacts%20of%20climate%20change.pdf"> Makwiza (2018) - Dissertation : Estimating outdoor water use allowing for the possible impacts of climate change </a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Makwiza%20-%20Estimating%20the%20impact%20of%20climate%20change.pdf">Makwiza, et al (2018)- Estimating the impact of climate change on residential water use using panel data analysis</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Donga%20-%20Environmental%20load%20of%20pesticides%20used%20in%20conventional%20sugarcane%20production%20in%20Malawi%20(2018).pdf">Donga and Eklo (2018): Environmental load of pesticides used in conventional sugarcane production in Malawi</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Limuwa%20-%20A%20GENDERED%20PERSPECTIVE%20ON%20THE%20FISH%20VALUE%20CHAIN.pdf">Limuwa (2018): A Gendered perspective on the fish value chain, livelihood patterns and coping strategies.</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Limuwa%20et%20al.%202018%20-%20Evaluation%20of%20Small-Scale%20Fishers%E2%80%99%20Perceptions%20on%20Climate%20Change.pdf">Limuwa, et al. (2018): Evaluation of Small-Scale Fishers’ Perceptions on Climate Change and Their Coping Strategies.</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Limuwa%20-%20sustainability%20fish%20farming.pdf">Limuwa, et al (2018): Is Fish Farming an Illusion for Lake Malawi Riparian Communities under Environmental Changes&#63;</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Geresomu%20Riskfactors%20of%20stunting.pdf">Geresomo, et al (2017): Riskfactors of stunting</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Geresomu%20Factors%20Affecting%20child%20feeding.pdf">Geresomo (2017) : Factors affecting child feeding</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Makwiza%20-%20Sound%20recording%20to%20characterize%20outdoor%20tap%20water%20use%20events.pdf">Makwiza and Jacobs (2017) - Sound recording to characterize outdoor tap water use events </a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Makwiza%20-%20Assessing%20the%20impact%20of%20propertysizeon%20residential%20water.pdf">Makwiza and Jacobs (2016) - Assessing the impact of propertysizeon residential water use</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Searching%20for%20Sustainable%20%20Solutions%20in%20Cook%20Stove%20Practice%20in%20Malawi%20%20A%20Cultural%20Historical%20Activity%20Theory%20Approach.pdf">Chisoni (2016): Searching for sustainable solutions in improved cookstove practice in Malawi</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Makwiza%20-%20Correlating%20sound%20and%20flow%20rate%20at%20a%20tap.pdf">Makwiza, et al (2015) - Correlating sound and flow rate at a tap</a></li>
                                         <li><a href="https://luanar.ac.mw/pco2/downloads/Makwiza%20-%20assess%20the%20possible%20impacts%20of%20climate%20change%20on%20domestic%20irrigation%20water%20use.pdf">Makwiza, et al (2015) - assess the possible impacts of climate change on domestic irrigation water use</a></li>

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
