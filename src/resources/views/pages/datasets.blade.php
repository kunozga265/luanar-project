<x-app-layout>
    <div class="event-details-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar-widget">
                        <x-navigation></x-navigation>
                        @include('components.sidebar')
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="event-details-content">
                        <div class="single-event-item" style="padding:0">
                            <div class="single-event-image" style="border-bottom: 1px solid #e1e1e1;">
                                <form method="post" action="{{route('search')}}" class="searchSection">
                                    @csrf
                                    <h4>Search</h4>

                                    <div class="search-field">

                                        <label for="title" class="form-group">By Title</label>
                                        <div class="field">
                                            {{--                                            <i style="" class="fa fa-search"></i>--}}
                                            <input type="text" id="title" name="title" class="form-control" style="">
                                        </div>

                                    </div>

                                    <div class="search-filters">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="authors" class="form-group">By Authors</label>
                                                <select id="authors" name="author" class="form-control">
                                                    <option value="">Select Author</option>
                                                    @foreach($authors as $author)
                                                        <option value="{{$author->id}}">{{$author->firstName}} {{$author->middleName}} {{$author->lastName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <label for="type" class="form-group">Type Of</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option value="">Select Type</option>
                                                    @foreach($types as $type)
                                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <label for="sort" class="form-group">Sort By</label>
                                                <div class="row">
                                                    <div class="col-sm-6" style="padding-right: 5px">
                                                        <select name="sort" id="sort" class="form-control">
                                                            <option value="title">Title</option>
                                                            <option value="year">Date</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6" style="padding-left: 5px">
                                                        <select name="order" id="sort" class="form-control">
                                                            <option value="asc" >Ascending</option>
                                                            <option value="desc" >Descending</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="text-align: center">
                                        <input class="btn btn-primary" style="background: #03a100;"  type="submit" value="Search">
                                    </div>

                                </form>
                            </div>
                            <div class="single-event-text" style="padding:0; background-color: white">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                    Unverified Datasets
                                                    (<span>
                                                        @if(is_object($unverifiedDatasets))
                                                            {{$unverifiedDatasets->count()}}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>)
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse">
                                            <div class="panel-body" style="    background-color: #f6f6f6;">
                                                <div class="listing">
                                                    @if(is_object($unverifiedDatasets))
                                                        @if($unverifiedDatasets->count() == 0)
                                                            <p>No datasets found.</p>
                                                        @endif

                                                        <ol>
                                                            <div class="owl-carousel owl-theme">
                                                                @foreach($unverifiedDatasets as $dataset)
                                                                    <li>
                                                                        <div>
                                                                            <b>{{$loop->index + 1}} .  </b> {{$dataset->title}}
                                                                        </div>
                                                                        @if($dataset->keywords->count() > 0)
                                                                        <div class="keywords">
                                                                            @foreach($keywords=$dataset->keywords as $_keyword)
                                                                                <a href="{{route('keywords',['slug'=>$_keyword->slug])}}"> {{$_keyword->name}}</a>
                                                                            @endforeach
                                                                        </div>
                                                                        @endif
                                                                        <div class="item__footer">
                                                                            <div class="authors">
                                                                                <div>
                                                                                    @foreach($authors=$dataset->authors as $author)
                                                                                        @if($loop->last)
                                                                                            {{$author->firstName[0]}}. {{$author->lastName}}
                                                                                        @else
                                                                                            {{$author->firstName[0]}}. {{$author->lastName}},
                                                                                        @endif

                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                            <div class="date">
                                                                                <div><i class="mdi mdi-calendar"></i> {{$dataset->month ?? ''}} {{$dataset->year}}</div>
                                                                                {{--                                                        <div><i class="mdi mdi-download"></i>{{$dataset->downloadCount}}</div>--}}
                                                                                <div><a href="{{asset($dataset->file)}}" class="font-weight-600" target="_blank">Download <i class="mdi mdi-download"></i></a></div>

                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <form method="post" action="{{route('datasets.verify',['id'=>$dataset->id])}}">
                                                                                @csrf
                                                                                <input class="btn btn-primary" style="background: #03a100; margin-top: 12px"  type="submit" value="Verify">
                                                                            </form>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </div>
                                                        </ol>
                                                    @else
                                                        <p>No publications found.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing">
                                    <ol>
                                        <a href="{{route('upload')}}" class="btn btn-primary" style="background: #03a100;" >Upload Dataset <i class="mdi mdi-arrow-up"></i></a>
                                        <hr>
                                        @foreach($datasets as $dataset)
                                            <li>
                                                <div>
                                                    <b>{{$loop->index + 1}} .  </b> {{$dataset->title}}
                                                </div>
                                                @if($dataset->keywords->count() > 0)
                                                <div class="keywords">
                                                    @foreach($keywords=$dataset->keywords as $_keyword)
                                                        <a href="{{route('keywords',['slug'=>$_keyword->slug])}}"> {{$_keyword->name}}</a>
                                                    @endforeach
                                                </div>
                                                @endif
                                                <div class="item__footer">
                                                    <div class="authors">
                                                        <div>
                                                            @foreach($authors=$dataset->authors as $author)
                                                                @if($loop->last)
                                                                    {{$author->firstName[0]}}. {{$author->lastName}}
                                                                @else
                                                                    {{$author->firstName[0]}}. {{$author->lastName}},
                                                                @endif

                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="date">
                                                        <div><i class="mdi mdi-calendar"></i> {{$dataset->month ?? ''}} {{$dataset->year}}</div>
{{--                                                        <div><i class="mdi mdi-download"></i>{{$dataset->downloadCount}}</div>--}}
                                                        <div><a href="{{asset($dataset->file)}}" class="font-weight-600" target="_blank">Download <i class="mdi mdi-download"></i></a></div>

                                                    </div>
                                                </div>
                                                <hr>
                                            </li>
                                        @endforeach
                                    </ol>
                                  {{--  <div>
                                        <p style="text-align: justify">LUANAR’s AquaFish ACE supports cutting edge research for students, staff and partners involved in the ACE II Project. AquaFish has put in place a research agenda which guides the growth and development of ACE II innovative research approaches.<br></p>

                                        <p style="text-align: justify">The AquaFish center facilitates and promotes community action research, and strengthens linkages with the private sector in the region while increasing females and youth participation</p><br>
                                        <p style="text-align: justify">The center has trained students, faculty and farmers through employing innovative, entrepreneurial and multidisciplinary approaches to training, research and outreach on production, value addition and fisheries management, through strategic south-south and north-south partnerships with advanced knowledge institutions and other higher education stakeholders.</p><br>

                                        <h3 style="margin-bottom: 20px">ACE AQUAFISH PUBLICATIONS</h3>
                                        <ol>
                                            <li>
                                                <div>
                                                    <b>1 .  </b>Elias Rabson Chirwa , Limbikani Chilima (2018 ) Use of benthic macroinverterbrate indices as bio-indicators of ecosystem healtha for the detection of degraded landscapes in malawi .International Journal of Agriculture, Forestry and Fisheries (  <a href="http://www.openscienceonline.com/journal/ijaff">http://www.openscienceonline.com/journal/ijaff )</a>
                                                </div>
                                                <div class="item__footer">
                                                    <div class="authors">
                                                        <div>
                                                            Mirriam Mars, Mirriam Mars, Mirriam Mars, Mirriam Mars
                                                        </div>
                                                        --}}{{--
                                                        <div class="author">
                                                            <div><img src="{{asset('images/avatar.png')}}" alt=""></div>
                                                            <div>Mirriam Mars</div>
                                                        </div>
                                                        <div class="author">
                                                            <div><img src="{{asset('images/avatar.png')}}" alt=""></div>
                                                            <div>Mirriam Mars</div>
                                                        </div>--}}{{--
                                                    </div>
                                                    <div class="date">
                                                        <div><i class="mdi mdi-calendar"></i> January, 2022</div>
                                                        <div><i class="mdi mdi-download"></i>20</div>

                                                    </div>
                                                </div>
                                                <hr>
                                            </li>

                                            <li>
                                                <p><b>2 .  </b>Camerson Donald Ng'ambi , Prakash Patil, Satish Rama Poojary, AbhimanBallyaya, Naveen Kumar Thammegouda, Ramesh Kashi Srinivasayya (2018 ) Skim milk flocculation concentrates white spot syndrom virus in seawater for the detections using a monocional antibody base flow-through assay .International Journal of Poultry and Fisheries Sciences (  <a href="?https://symbiosisonlinepublishing.com/poultry-fisheries-science/">?https://symbiosisonlinepublishing.com/poultry-fisheries-science/ )</a></p>
                                                <hr>
                                            </li>

                                            <li>
                                                <p><b>3 .  </b>Jeremiah  Kang'ombe , Jane Yatuha, J Rutaisire, L Chapman,, D Sikawa (2018 ) Reproductive strategies of smooth-head catfish Clarias liocephalus (Boulenger,1898), in the Rwizi-Rufuha wetland system,south-western Uganda .African Journal of Aquatic Science (  <a href="https://doi.org/10.2989/16085914.2018.1470082">https://doi.org/10.2989/16085914.2018.1470082 )</a></p>
                                                <hr>
                                            </li>

                                            <li>
                                                <p><b>4 .  </b>Mose Majid Limuwa , Wales Singini, Trond Storebakken (2018 ) Is Fish Farming an Illusion for Lake Malawi Riparian Communities under Environmental Changes. .Sustainability (  <a href="doi:10.3390/su1005145">doi:10.3390/su1005145 )</a></p>
                                                <hr>
                                            </li>




                                            <li>



                                                <p><b>5 .  </b>Bonface Nankwenya , M. Alexander R Phiri, Abdi Khalil Edriss, Emmanuel Kaunda, Horace Phiri, Sloans Chimatiro (2018 ) Determinats of Fish Tade Flows in Africa .Journal of Sustainable Development (  <a href="https://doi.org/10.5539/jsd.v11n3p123">https://doi.org/10.5539/jsd.v11n3p123 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>6 .  </b>Wislon  Lazaro Jere , Mohsen Abdel- Tawwab, Chloe Kemigabo, Daniel Sikawa, Charles Masembe, Jeremiah Kang'ombe (2018 ) Combined effect of dietary protein and phytase levels on growth perfomance,feed utilization, and nutrients digestibility of African catfish, Clarias gariepinus (B.),reared in earthen ponds .Journal of Applied Aquaculture (  <a href="https://doi.org/10.1080/10454438.2018.1439425">https://doi.org/10.1080/10454438.2018.1439425 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>7 .  </b>Daud Kassam, , Mireku K.K., Wisdom Changadeya and F.Y.K. Attipoe (2017 ) Characterization of the production and dissemination systems of Nile Tilapia in some coastal communities in Ghana. .Sustainable Agriculture Research (  <a href="DOI: 10.5539/sarv7n1p14.">DOI: 10.5539/sarv7n1p14. )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>8 .  </b>Francis Maguza-Tembo , Abdi-Khalil Edriss, Julius Mangisoni and Kenamu (2017 ) Adoption determinants of multiple climate change adaptation strategies in Southern Malawi: An ordered probit analysis. .Journal of Development and Agricultural Economics (  <a href="https://pdfs.semanticscholar.org/3f60/d3b0c43440ebb0a5029dabd15c0cdd077a19.pdf">https://pdfs.semanticscholar.org/3f60/d3b0c43440ebb0a5029dabd15c0cdd077a19.pdf )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>9 .  </b>Francis Maguza-Tembo , Abdi-Khalil Edriss, Julius Mangisoni (2017 ) Determinants of Climate Smart Agriculture Technology Adoption in the Drought Prone Districts of Malawi using a Multivariate Probit Analysis. .Asian Journal of Agricultural Extension, Economics & Sociology (  <a href="http://www.sciencedomain.org/download/MTg1NzBAQHBm.pdf">http://www.sciencedomain.org/download/MTg1NzBAQHBm.pdf )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>10 .  </b>Jeremiah Kang'ombe, , Chloe Kemigabo, Wilson Jere, Daniel Sikawa, Tefula Moses Dhikusooka and Charles Masembe` (2017 ) Effect of toasting on phytic acid, protein and pH in a plant-based diet and its ingesta in fed catfish. .African Journal of Rural Development (  <a href="http://www.afjrd.org/jos/index.php/afjrd/article/view/222">http://www.afjrd.org/jos/index.php/afjrd/article/view/222 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>11 .  </b>Jeremiah Kang?ombe , Chloe Kemigabo,  Charles Masembe Wilson Jere and Daniel Sikawa (2017 ) Effects of protease enzyme supplementation on protein digestibility of legume and/or fish meal-based fish feeds.  DOI: 10.5897/IJFA2017.0620. .International Journal of Fisheries and Aquaculture. (  <a href="http://www.academicjournals.org/journal/IJFA/article-full-text-pdf/12EF10E65301">http://www.academicjournals.org/journal/IJFA/article-full-text-pdf/12EF10E65301 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>12 .  </b>Daud Kassam, , Mireku K.K., Wisdom Changadeya, F.Y.K. Attipoe and C.A. Ardinotey (2017 ) Assessment of genetic variations of Nile Tilapia (Oreochromis niloticus) in the Volta Lake of Ghana using microsatellite markers. .African Journal of Biotechnology (  <a href="http://www.academicjournals.org/journal/AJB/article-abstract/1CA06B062784">http://www.academicjournals.org/journal/AJB/article-abstract/1CA06B062784 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>13 .  </b>J. Kang'ombe, , Mosha, S.S. , W. Jere and N. Madalla (2017 ) Effect of organic and inorganic fertilizers on natural food composition and performance of African catfish fry produced under artificial propagation. .Africa Journal of Rural Development (  <a href="http://www.afjrd.org/jos/index.php/afjrd/article/view/200/65">http://www.afjrd.org/jos/index.php/afjrd/article/view/200/65 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>14 .  </b>Daniel Sikawa , Neverson Msusa, Fanuel Kapute, Austin Mtethiwa and Jeremy Likongwe (2017 ) Effect of processing method on proximate composition of gutted fresh Mcheni (Rhamphochromis species) (Pisces: Cichlidae) from Lake Malawi.   Issue 4 - .International Food Research Journal (  <a href="http://www.ifrj.upm.edu.my/24%20(04)%202017/(23).pdf">http://www.ifrj.upm.edu.my/24%20(04)%202017/(23).pdf )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>15 .  </b>Chonde, C , Njera, D., Kambewa, D., Dzanja, J., Kayambazinthu, D and Kaunda, E. (2017 ) Institutional Environment Affecting Capacity of Fish Farmer Organisations in Dowa and Mchinji Districts in Central Malawi. .Journal of Agricultural Economics, Extension and Rural Development (  <a href="http://www.springjournals.net/full-articles/springjournals.netjaeerdarticlesindex=13njeraetal.pdf?view=inline">http://www.springjournals.net/full-articles/springjournals.netjaeerdarticlesindex=13njeraetal.pdf?view=inline )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>16 .  </b>Chonde, C, , Njera, D., Kambewa, D., Dzanja, J., Kayambazinthu, D. (2017 ) Examining the Significance of Gender, Marital Status, Landholding Size and Age of Members on Capacity of Local Level Fish Farmer Organisations. .International Journal of Natural Resource Ecology and Management (  <a href="http://article.sciencepublishinggroup.com/pdf/10.11648.j.ijnrem.20170204.12.pdf">http://article.sciencepublishinggroup.com/pdf/10.11648.j.ijnrem.20170204.12.pdf )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>17 .  </b>E. Kaunda , Singini, W., V. Kasulo and W. Jere. (2017 ) Factors influencing intertemporal preference of fisheries resource users of Lake Malombe in Malawi. .Malawi Journal of Agriculture, Natural Resources and Development Studies (  <a href="https://www.researchgate.net/profile/Kumbukani_Mzengereza/publication/319114864_proximate_analysis_of_freshly_caught_chambo_from_chia_lagoon/links/59924936a6fdcc53b79b692e/proximate-analysis-of-freshl">https://www.researchgate.net/profile/Kumbukani_Mzengereza/publication )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>18 .  </b>Happy Mussa , Emmanuel Kaunda, Sloans Chimatiro, Keagan Kakwasha, Lisungu Banda, Bonface Namkwenya, Jabulani Nyengere (2017 ) Assessment of Informal Cross-Boarder Fish Trade in the Southern Africa Region: A case of Malawi and Zambia .Journal of Agricultural Science and Technology (  <a href="doi:  10.17265/2161-6264/2017.05.009">doi:  10.17265/2161-6264/2017.05.009 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>19 .  </b>Wison Jere, , Chloe Kemigabo, Daniel Sikawa, Jeremiah Kang ombe, Charles Masembe (2017 ) Apparent Digestibility and Utilization of Protein and Phosphorus in diets of incorporated with Sprouted Sorghum, Phytase and Protease Enzymes for African Catfish (Clarias gariepinus) .International Journal of Fisheries and Aquaculture (  <a href="http://doi.org/10.17352/2455-8400.000033">http://doi.org/10.17352/2455-8400.000033 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>20 .  </b>Daud Kassam , Elysee Nzohabonayo amd Jeremiah Kang?ombe. (2017 ) Effect of lipid levels on reproductive performance of Oreochromis karongae (Trewavas 1941). .Aquaculture Research (  <a href="https://doi.org/10.1016/j.ejar.2017.07.002">https://doi.org/10.1016/j.ejar.2017.07.002 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>21 .  </b>Daud Kassam , Elysee Nzohabonayo and Jeremiah Kang?ombe. (2017 ) Effect of hybridisation on   fecundity of Oreochromis karongae (Trewavas 1941) .Egyptian Journal of Aquatic Research. (  <a href="https://doi.org/10.1016/j.ejar.2017.07.002">https://doi.org/10.1016/j.ejar.2017.07.002 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>22 .  </b>Daud Kassam , Wisdom Changadeya, Hamad Stema, Wilson Jere, Emmanuel Kaunda (2017 ) Genetic and morphological differentiation among mpasa (Opsaridium microlepis G?nther, 1864), populations from inflow rivers of Lake Malawi. International Journal of Fisheries and Aquaculture .International Journal of Fisheries and Aquaculture (  <a href="https://www.researchgate.net/profile/Wisdom_Changadeya/publication/317379671_International_Journal_of_Fisheries_and_Aquaculture_Morphological_and_genetic_variability_among_Mpasa_Opsaridium_microlepis_">https://www.researchgate.net/profile/Wisdom_Changadeya/publication )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>23 .  </b>Daud Kassam , Elias Chirwa, Wilson Jere, Austin Mtethiwa (2017 ) A review of the farming of common carp (Cyprinus carpio L.) in Malawi. Policy research directions for aquaculture development in Malawi .International Journal of Fisheries and Aquaculture (  <a href="http://www.academicjournals.org/journal/IJFA/article-full-text-pdf/C8E668564577">http://www.academicjournals.org/journal/IJFA/article-full-text-pdf/C8E668564577 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>24 .  </b>Boniface Nakwenya , Emmanule Kaunda and Sloans Chimatiro (2017 ) The demand for fish products in Malawi: An Almost Ideal Demand System Estimation. Journal of Economics and Sustainable Development .Journal of Economics and Sustainable Development (  <a href="http://www.iiste.org/Journals/index.php/JEDS/article/view/38380">http://www.iiste.org/Journals/index.php/JEDS/article/view/38380 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>25 .  </b>Priscilla Longwe , Fanuel Kapute (2016 ) Nutritional Composition of Smoked and Sun dried Pond raised Oreochromis karongae (Trewavas, 1941) and Tilapia rendalli (Boulenger, 1896) .American Journal of Food and Nutrition (  <a href="http://pubs.sciepub.com/ajfn/4/6/3/index.html">http://pubs.sciepub.com/ajfn/4/6/3/index.html )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>26 .  </b>Francis Maguza-Tembo , Edwin Kenamu, (2016 ) Drivers of adoption and intensity of adoption of goat Farming in Southern Malawi .Journal of Economics and Sustainable Development (  <a href="http://iiste.org/Journals/index.php/JEDS/article/view/31991/33019">http://iiste.org/Journals/index.php/JEDS/article/view/31991/33019 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>27 .  </b>Daud Kassam , Marcus Sangazi (2016 ) Comparative growth performance between Oreochromis hybrids and selectively-bred strain (F8) in Malawi .Sustainable Agriculture Research (  <a href="doi:10.5539/sar.v5n4p13.">doi:10.5539/sar.v5n4p13. )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>28 .  </b>Jeremiah Kang'ombe , Joshua Valeta, Fanuel Kapute, Nagoli Joseph, David Mbamba (2016 ) Growth performance of three tilapia fish species raised at varied pond sizes and water depths .International Journal of Fisheries and Aquaculture (  <a href="http://www.academicjournals.org/IJFA">http://www.academicjournals.org/IJFA )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>29 .  </b>Joshua Valeta , Fanuel Kapute, Chisomo Goliati (2016 ) Effect of Prolonged Storage in Ice on Nutrient Composition and Sensory Quality of Whole Fresh Pond Raised Tilapia Fish (Oreochromis shiranus) .American Journal of Food and Nutrition (  <a href="http://pubs.sciepub.com/ajfn/4/5/">http://pubs.sciepub.com/ajfn/4/5/ )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>30 .  </b>Francis Maguza-Tembo , Edriss A.K., Mangisoni J. and Mkwambisi D (2016 ) Does adoption of Climate Smart Agriculture (CSA) Technologies reduce household vulnerability to poverty? .Journal of Economics and Sustainable Development (  <a href="http://iiste.org/Journals/index.php/JEDS/article/view/34164">http://iiste.org/Journals/index.php/JEDS/article/view/34164 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>31 .  </b>Francis Maguza-Tembo , Abdi-Khalil Edriss, Julius Mangisoni and David Mkwambisi (2016 ) Impact of soil and water conservation improvement on the welfare of smallholder farmers in Southern Malawi .Journal of Economics and Sustainable Development (  <a href="http://www.iiste.org/Journals/index.php/JEDS/article/view/34182">http://www.iiste.org/Journals/index.php/JEDS/article/view/34182 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>32 .  </b>Daniel Sikawa , Neverson Msusa,  Fanuel Kapute, Jeremy Likongwe, Austin Mtethiwwa (2016 ) Effect of sun-drying, smoking and salting on proximate composition of fresh. fillets of Mcheni (. Rhamphochromis. species - Pisces: Cichlidae) from Lake Malawi .International Journal of Aquaculture (  <a href="http://biopublisher.ca/index.php/ija/article/html/2585/">http://biopublisher.ca/index.php/ija/article/html/2585/ )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>33 .  </b>Wilson Jere , Mexford Mulumpwa, Austin Mtethiwa, Tasokwa Kakota, Jeremiah Kang'ombe (2016 ) Application of forecasting in determining efficiency of fisheries management strategies of artisanal Labeo mesops fishery of Lake Malawi .International Journal of Scientific and Technology Research (  <a href="http://www.ijstr.org/final-print/sep2016/Application-Of-Forecasting-In-Determining-Efficiency-Of-Fisheries-Management-Strategies-Of-Artisanal-Labeo-Mesops-Fishery-Of-Lake-Malawi.pdf">http://www.ijstr.org/final-print/sep2016/Application-Of-Forecasting-In-Determining-Efficiency-Of-Fisheries-Management-Strategies-Of-Artisanal-Labeo-Mesops-Fishery-Of-Lake-Malawi.pdf )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>34 .  </b>Emmanuel Kaunda , Dalo Njera, Daimon Kambewa, Charity Chonde, Dennis Kayambazinthu, (2016 ) Local Community Perspective about Challenges Affecting Farmer Organizations. Case of Selected Socioeconomic Characteristics of Members in Fish Farmer Organizations in Central Malawi .International Journal of Research in Agriculture and Forestry (  <a href="http://www.ijraf.org/papers/v3-i12/1.pdf">http://www.ijraf.org/papers/v3-i12/1.pdf )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>35 .  </b>Emmanuel Kaunda , Dalo Njera, Daimon Kambewa, Charity Chonde, Dennis Kayambazinthu, (2016 ) What Influences Capacity of Fish Farmer Organizations? Experiences of CARP Fish Farmer Organizations in Dowa and Mchinji District in Central Malawi .Modern Agricultural Science and Technology (  <a href="http://www.academicstar.us/UploadFile/Picture/2017-3/20173273458784.pdf">http://www.academicstar.us/UploadFile/Picture/2017-3/20173273458784.pdf )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>36 .  </b>Joseph Dzanja , Dalo Njera, Daimon Kambewa, Charity Chonde, Dennis Kayambazinthu,  Emmanuel Kaunda, Lisungu Moyo, Msekiwa Matsimbe, and  C. German and Msandu (2016 ) Member-Specific Characteristics Affecting Capacity of Farmer organisations in Promoting Fish Farming: Case of Dowa and Mchinji Districts in Malawi. .International Journal of Research in Agriculture and Forestry (  <a href="http://www.ijraf.org/papers/v3-i11/2.pdf">http://www.ijraf.org/papers/v3-i11/2.pdf )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>37 .  </b>Joshua Valeta , Jeremy Likongwe, Daud Kassam, D. Maluwa, Brino Chirwa (2016 ) Assessment of Apparent Effectiveness of Chemical Egg Disinfectants for Improved Artificial Hatching in Oreochromis karongae (Pisces: Cichlidae) .African Journal of Food, Agriculture, Nutrition and Development (  <a href="https://www.ajol.info/index.php/ajfand/article/view/149211">https://www.ajol.info/index.php/ajfand/article/view/149211 )</a></p>

                                                <hr>

                                            </li>




                                            <li>



                                                <p><b>38 .  </b>Apatsa Pearson Chilewa , Daud Kassam and Chiwanda V.J.M (2016 ) Assessment of growth and survival rates of African Catfish (Clarias gariepinus BURCHELL 1852) fry fed on soybean milk-based diets. International Journal of Aquaculture .International Journal of Aquaculture (  <a href="doi:10.5376/ija.2016.06.007">doi:10.5376/ija.2016.06.007 )</a></p>

                                                <hr>

                                            </li>

                                        </ol>
                                    </div>--}}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
