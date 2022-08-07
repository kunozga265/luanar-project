<?php

namespace Database\Seeders;

use App\Http\Controllers\AppController;
use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article=Article::create([
            'file'          =>  "files/articles/Cleaner Cooking Camp 2018.pdf",
            'title'         =>  "Investigating and Expanding Learning across Activity System Boundaries in Improved Cook Stove Innovation Diffusion and Adoption in Malawi. A presentation at the Cleaner Cooking Camp 5-7 June 2018, Sol-Farm, Lilongwe, Malawi",
            'year'          =>  "2018",
            'abstract'      =>  null,
            'downloadCount' =>  0,
            'journal_id'    =>  null,
        ]);

        //Attach Keywords
//        (new AppController())->attachKeywords($article,["Cook Stove"]);

        //Attach Authors
        (new AppController())->attachAuthors($article,[8]);

        /*****************************************************/
        $article=Article::create([
            'file'          =>  "files/articles/Donga - Environmental load of pesticides used in conventional sugarcane production in Malawi (2018).pdf",
            'title'         =>  "Environmental load of pesticides used in conventional sugarcane production
in Malawi",
            'year'          =>  "2018",
            'abstract'      =>  "The sugarcane industry is the third largest user of pesticides in Malawi. Our aim with this study was to document pesticide use and handling practices that influence pesticide exposure among sugarcane farmers in Malawi. A semi-structured questionnaire was administered to 55 purposively selected sugarcane farmers and 7 key informants representing 1474 farmers in Nkhata Bay, Nkhotakota and Chikwawa Districts in Malawi. Our results indicate that herbicides and insecticides were widely used. Fifteen moderately and one extremely hazardous pesticide, based on World Health Organization (WHO) classification, were in use. Several of these pesticides: ametryn, acetochlor, monosodium methylarsonate and profenofos are not approved in the European Union because of their toxicity to terrestrial and aquatic life, and/or persistence in water and soil. Farmers (95%) knew that pesticides could enter the human body through the skin, nose (53%) and mouth (42%). They knew that pesticide runoff (80%) and leaching (100%) lead to contamination of water wells. However, this knowledge was not enough to motivate them to take precautionary measures to reduce pesticide exposure. Farmers (78%) had experienced skin irritation, 67% had headache, coughing and running nose during pesticide handling. Measures are in place to reduce pesticide exposure in the large estates and farms operated by farmer associations. Smallholder farmers acting independently do not have the resources and capacity to minimize their exposure to pesticides. There is need to put in place pesticide residue monitoring programs and farmer education on commercial sugarcane production and safe pesticide use as ways of reducing pesticide exposure.",
            'downloadCount' =>  0,
            'type_id'       =>  1,
            'journal_id'    =>  1,
        ]);

        //Attach Keywords
        (new AppController())->attachKeywords($article,["Pesticides Exposure","Sugarcane","Environment Load","EIQ"]);

        //Attach Authors
        (new AppController())->attachAuthors($article,[3,4]);

        /*****************************************************/
        $article=Article::create([
            'file'          =>  "files/articles/Experencia Jalasi final thesis.pdf",
            'title'         =>  "Investigating and Expanding Learning across
Activity System Boundaries in Improved Cook Stove
Innovation Diffusion and Adoption in Malawi",
            'year'          =>  "2018",
            'abstract'      =>  "This study investigates and expands learning within and between activity systems working with Improved Cook Stoves (hereafter ICS) in Malawi. The study focuses on how existing learning interactions among ICS actors can be expanded using expansive learning processes, mobilised through Boundary Crossing Change Laboratories (BCCL) to potentially inform more sustained uptake and utilisation of the ICS technology. The ICS, as a socio-technical innovation, seeks to respond to climate change mitigation and adaptation efforts in the country. However, sustained uptake and utilisation has been problematic.",
            'downloadCount' =>  0,
            'journal_id'    =>  null,
        ]);

        //Attach Keywords
//        (new AppController())->attachKeywords($article,["Cook Stove"]);

        //Attach Authors
        (new AppController())->attachAuthors($article,[8]);

        /*****************************************************/
        $article=Article::create([
            'file'          =>  "files/articles/Geresomu Factors Affecting child feeding.pdf",
            'title'         =>  "Child Feeding Practices and Factors (Risks) Associated with Provision of Complementary Foods Among Mothers of Children Age 6–23 Months in Dedza District of Central Malawi",
            'year'          =>  "2017",
            'abstract'      =>  "Prevalence of stunting among children in Dedza district of Central Malawi affects 51.1% of underfive children and 47.1% of children aged 6 to 23 months. Evidence shows that appropriate complementary feeding reduces stunting and leads to improved health and growth outcomes. In Dedza district, information on factors contributing to the high prevalence of stunting among children is nonexistent. The study was conducted to investigate infant and young child feeding practices and to identify factors (risks) that might contribute to undernutrition. Findings of the study would assist in identifying strategies for improving child feeding practices and nutritional status in the district. Four community-based focus group discussions (FGDs) with mothers and caregivers were conducted to gain a comprehensive understanding of child feeding practices and the safety of the foods given to the children. We found that the majority of mothers and caregivers had low levels of education and about 80% of mothers prepared complementary foods from maize flour only. Addition of other foods such as beans, soybeans and groundnuts to complementary foods was rare. Timely initiation of complementary feeding was practiced by 77.1% of mothers, 8.6% introduced food earlier and 14.3% introduced later than six months. About 45% of children had diarrhoea which was associated with poor hygiene practices and poor storage of complementary food. Factors leading to poor complementary feeding included lack of food diversity at household level, increased work burden of mothers and caregivers which led to reduced feeding frequency and inadequate knowledge of mothers to process and prepare nutritious complementary food. It is therefore recommended that to reverse the situation, mothers and caregivers should be trained on use of energy and time saving technologies, hygiene practices, food processing, preparation and appropriate child feeding practices.",
            'downloadCount' =>  0,
            'type_id'       =>  1,
            'journal_id'    =>  2,
        ]);

        //Attach Keywords
        (new AppController())->attachKeywords($article,["Complementary Food","Malnutrition","Meal Frequency","Hygiene Practices","Diarrhoea"]);

        //Attach Authors
        (new AppController())->attachAuthors($article,[6,11,12,13]);

        /*****************************************************/
        $article=Article::create([
            'file'          =>  "files/articles/Geresomu Riskfactors of stunting.pdf",
            'title'         =>  "RISK FACTORS ASSOCIATED WITH STUNTING AMONG INFANTS AND YOUNG CHILDREN AGED 6 - 23 MONTHS IN DEDZA DISTRICT OF CENTRAL MALAWI",
            'year'          =>  "2017",
            'abstract'      =>  "The prevalence of stunting is high in Malawi, affecting about one third (31.2%) of children aged 6-23 months. Persistent inappropriate feeding practices are some of the major causes of stunting in young children. This study was conducted to determine risk factors associated with stunting among infants and young children aged 6-23 months in Dedza district in Central Malawi. A cross-sectional study was conducted in 12 villages in Mayani Extension Planning Area (EPA), targeting households with children aged 6- 23 months. A structured questionnaire was used to collect data from the primary caregivers on household socioeconomic characteristics, household food availability, dietary diversity, responsive feeding practices among mothers and caregivers, age of introduction of complementary foods, frequency of feeding, types of foods and dietary diversity of children. Anthropometric data (weight and recumbent length) for children were measured using standard procedures. The Multivariate Logistic Regression Analysis was performed to study the independent associations of various determinants on prevalence of stunting with prevalence of stunting as a dependent variable. A total of 303 households were sampled randomly; mothers and caregivers were interviewed and 306 children were assessed for nutritional status. Introduction of complementary food varied among mothers, 9.3% introduced earlier than 6 months, 71.1% at 6 months and 10.2% later than 6 months. Dietary diversity was low but increased significantly with age categories of children, 2.9% for children 6-8 months, 15.5% for 9-11 months and 24.6% for 12-23 months (p<0.01). Minimum meal frequency was significantly (p<0.001) higher in children 6-8 months (58.7%) than in children 12-23 months (1.9%). Overall, out of the 306 children 47.1% [95% CI (41.6-53.1)] were stunted. Stunting was significantly different between male [54.5%; 95% CI (47.0-63.5)] and female (39.5%; 95% CI (31.4-47.6)] children. Age of child when complementary feeding was started [AOR: 0.138; 95% CI (0.22-0.88)], number of young children in the household [AOR: 2.548; 95% CI (1.304-4.981)] and teenage mothers [AOR: 1.265; 95% CI (0.379-1.724)] were significant independent predictors of stunting. It can be concluded that prevalence of stunting is high among infants and young children in Dedza district. Training mothers and caregivers on recommended age of introducing complementary food to a child, composition of such food, dangers of teenage pregnancies and importance of child spacing should form part of nutrition education.",
            'downloadCount' =>  0,
            'type_id'       =>  1,
            'journal_id'    =>  3,
        ]);

        //Attach Keywords
        (new AppController())->attachKeywords($article,["Nutritional status","dietary diversity","complementary feeding","meal frequency","responsive feeding"]);

        //Attach Authors
        (new AppController())->attachAuthors($article,[6,11,12,13]);

        /*****************************************************/
        $article=Article::create([
            'file'          =>  "files/articles/Geresomu Targeted Training Paper.pdf",
            'title'         =>  "Targeting caregivers with context specific behavior change training increased uptake of recommended hygiene practices during food preparation and complementary feeding in Dedza district of Central Malawi",
            'year'          =>  "2018",
            'abstract'      =>  "The effect of a targeted training intervention on uptake of recommended hygiene practices by caregivers of children 6–23 months was assessed. A sub-sample of 40 mothers from 303 households was used for a detailed study of hygiene practices during preparation of complementary foods after training. Mothers and caregivers were observed for 6 months and evaluated using a questionnaire. Data were analyzed using SPSS and Chi-square test was used to determine the differences in proportions of mothers and caregivers who adopted recommended practices. Results showed significant increase in the proportions of mothers and caregivers who followed recommended hygiene practices after training. There was significant decrease in prevalence of diarrhea among the children (45% to 8.6%). It can be concluded that targeted training on practical hands-on activities such as hand washing, cleaning of cooking and serving utensils, covering of food and water increase adoption of recommended hygiene and sanitation practices.",
            'downloadCount' =>  0,
            'type_id'       =>  1,
            'journal_id'    =>  4,
        ]);

        //Attach Keywords
        (new AppController())->attachKeywords($article,["Adoption","Hygiene Practices","complementary feeding","Sanitation","targeted training"]);

        //Attach Authors
        (new AppController())->attachAuthors($article,[6,11,12,13]);

        /*****************************************************/
        $article=Article::create([
            'file'          =>  "files/articles/Kabambe - Productivity and profitability on groundnut and maize.pdf",
            'title'         =>  "Productivity and profitability on groundnut (Arachis hypogaea L) and maize (Zea mays L) in a semi-arid area of southern Malawi",
            'year'          =>  "2018",
            'abstract'      =>  "In many parts of Malawi, including Balaka district in Southern Malawi, are prone to erratic rains with poor soil productivity and famer practices. A research and outreach project was initiated in October 2015 to establish learning centres (LCs) of groundnut: maize rotations as an entry point to diversify nutrition and income base of smallholder farmers, while building up on soil fertility for increased resilience to production under climatic variation. Some 132 plots of groundnut were established in 2015/2016 in four sections of Ulongwe Extension Planning Area (EPA) in Balaka district. Of these, 44 fields were sampled for yield, biomass, plant stand and soils data. In the second season of 2016/2017, a maize fertilizer response trial (five rates of NP2O5K2O; 0, 23:21:0+4S, 46:21:0+4S, 69:21:0+4S, and 92:21:0+4S) was super-imposed in plots where farmers incorporated groundnut residues, in comparison with continuous maize from adjacent own field. In the first season, rainfall was below average and erratic, with 10-day dry spells recorded in two of four recording stations. The soils were generally poor, with test values below threshold for many variables including organic matter, nitrogen and phosphorus. Groundnut average yields and standard deviation were 754 (±186) kg/ha, respectively. Plant stands were poor, with up to 24% of the 46 LCs attaining ≤50% of targeted plant stand of 8.88 plants m-2. Poor plant stand is suggested as a major contributor to low yields. Results from the 2016/2017 fertilizer response trials showed linear response of maize to fertilizer application. Yields ranged from an average of 1.47 t/ha without fertilizer application to 4.0 t/ha at 92:21:0+4S. It is concluded that the poor soil fertility, low field plant densities, and dry spells are the main causes of low yields. Gross margins were positive for groundnut yield of 1,000 kg/ha and fertilizer rates on maize of 46:23:0+4S and above",
            'downloadCount' =>  0,
            'type_id'       =>  1,
            'journal_id'    =>  5,
        ]);

        //Attach Keywords
        (new AppController())->attachKeywords($article,["Groundnut-maize rotation","nitrogen response","drought spells"]);

        //Attach Authors
        (new AppController())->attachAuthors($article,[1,2,9,14,16]);
    }
}
