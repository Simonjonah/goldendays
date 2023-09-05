<?php

use App\Http\Controllers\AcademicsessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QueryController;
// use App\Http\Controllers\TeacherassignController;

use App\Http\Controllers\StudentParentController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudycenterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClassnameController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\MainsliderController;
use App\Http\Controllers\PsycomotorController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SchoolfeeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherassignController;
use App\Http\Controllers\TestimonyController;
use App\Models\Academicsession;
// use App\Models\Team;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

  

    return view('auth.login');
});


Route::get('/register', function () {

  

    return view('auth.register');
});

Route::post('/createbooking', [BookingController::class, 'createbooking'])->name('createbooking');
Route::post('/createcontact', [ContactController::class, 'createcontact'])->name('createcontact');
Route::get('/search', [BlogController::class, 'search'])->name('search');
Route::get('/results', [BlogController::class, 'results'])->name('results');
// Route::get('/payment', [PaymentController::class, 'initiatePayment']);
// Route::post('/payment/callback', [PaymentController::class, 'handlePaymentCallback']);


Route::get('/printadmissionform/{ref_no}', [UserController::class, 'printadmissionform'])->name('printadmissionform');
Route::put('/addmedicalsdadmmin/{ref_no}', [UserController::class, 'addmedicalsdadmmin'])->name('addmedicalsdadmmin');
Route::put('/updateaddthirdondadmmin/{ref_no}', [UserController::class, 'updateaddthirdondadmmin'])->name('updateaddthirdondadmmin');
Route::post('/addsecondadmmin/{ref_no}', [UserController::class, 'addsecondadmmin'])->name('addsecondadmmin');
Route::get('/admission/medicalreports/{ref_no}', [UserController::class, 'medicalreports'])->name('medicalreports');
Route::get('/admission/secondregistration/{ref_no}', [UserController::class, 'secondregistration'])->name('secondregistration');
Route::get('/admission/thirdregistration/{ref_no}', [UserController::class, 'thirdregistration'])->name('thirdregistration');

Route::post('/createadmission', [UserController::class, 'createadmission'])->name('createadmission');
Route::get('/admission/admissionform/{slug}', [StudycenterController::class, 'admissionform'])->name('admissionform');
Route::post('/createteacher', [UserController::class, 'createteacher'])->name('createteacher');
Route::get('/viewsingleevent/{ref_no}', [EventController::class, 'viewsingleevent'])->name('viewsingleevent');
Route::get('/viewsinglemember/{ref_no}', [TeamController::class, 'viewsinglemember'])->name('viewsinglemember');

Route::get('/singleblog/{slug}', [BlogController::class, 'singleblog'])->name('singleblog');

Route::prefix('admin')->name('admin.')->group(function() {

    Route::middleware(['guest:admin'])->group(function() {

        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::view('/register','dashboard.admin.register')->name('register');
        Route::post('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/check', [AdminController::class, 'check'])->name('check');

    });
    
    Route::middleware(['auth:admin'])->group(function() {
        
        
        Route::get('addparent', [UserController::class, 'addparent'])->name('addparent');
        Route::get('viewcontact', [ContactController::class, 'viewcontact'])->name('viewcontact');
        Route::get('bookingdelete/{id}', [BookingController::class, 'bookingdelete'])->name('bookingdelete');
        Route::get('viewbookings', [BookingController::class, 'viewbookings'])->name('viewbookings');
        Route::put('changgeteacherclass/{id}', [UserController::class, 'changgeteacherclass'])->name('changgeteacherclass');
        Route::get('changeclasses/{ref_no}', [UserController::class, 'changeclasses'])->name('changeclasses');
        Route::get('queriedteachersreply', [QueryController::class, 'queriedteachersreply'])->name('queriedteachersreply');
        Route::get('academedelete/{id}', [AcademicsessionController::class, 'academedelete'])->name('academedelete');
        Route::put('updatesession/{id}', [AcademicsessionController::class, 'updatesession'])->name('updatesession');
        Route::get('academedit/{id}', [AcademicsessionController::class, 'academedit'])->name('academedit');
        Route::get('viewsession', [AcademicsessionController::class, 'viewsession'])->name('viewsession');
        Route::post('createsession', [AcademicsessionController::class, 'createsession'])->name('createsession');
        Route::get('addsession', [AcademicsessionController::class, 'addsession'])->name('addsession');
        Route::get('studentsubjects/{ref_no}', [UserController::class, 'studentsubjects'])->name('studentsubjects');
        Route::get('abujateachers', [UserController::class, 'abujateachers'])->name('abujateachers');
        Route::get('uyoteachers', [UserController::class, 'uyoteachers'])->name('uyoteachers');
        Route::get('viewteachersubjects/{user_id}', [TeacherassignController::class, 'viewteachersubjects'])->name('viewteachersubjects');
        Route::get('teachertosubjects', [TeacherassignController::class, 'teachertosubjects'])->name('teachertosubjects');
        Route::post('assignsubjectstoteacher/{id}', [TeacherassignController::class, 'assignsubjectstoteacher'])->name('assignsubjectstoteacher');
        Route::get('assignsubject/{id}', [SubjectController::class, 'assignsubject'])->name('assignsubject');
        Route::get('deletesubject/{id}', [SubjectController::class, 'deletesubject'])->name('deletesubject');
        Route::put('updatesubject/{id}', [SubjectController::class, 'updatesubject'])->name('updatesubject');
        Route::get('editsubject/{id}', [SubjectController::class, 'editsubject'])->name('editsubject');
        Route::get('viewteacherquery/{id}', [QueryController::class, 'viewteacherquery'])->name('viewteacherquery');
        Route::get('printquery/{id}', [QueryController::class, 'printquery'])->name('printquery');
        Route::put('addquerytoteacher/{ref_no}', [QueryController::class, 'addquerytoteacher'])->name('addquerytoteacher');
        Route::get('allteachers', [UserController::class, 'allteachers'])->name('allteachers');
        Route::get('queriedteachers', [QueryController::class, 'queriedteachers'])->name('queriedteachers');
        Route::get('sackedteachers', [UserController::class, 'sackedteachers'])->name('sackedteachers');
        Route::get('suspendedteachers', [UserController::class, 'suspendedteachers'])->name('suspendedteachers');
        Route::get('nurserysubjects', [SubjectController::class, 'nurserysubjects'])->name('nurserysubjects');
        Route::get('approveteachers', [UserController::class, 'approveteachers'])->name('approveteachers');
        Route::get('teachersprint', [UserController::class, 'teachersprint'])->name('teachersprint');
        Route::get('teacherquery/{ref_no}', [UserController::class, 'teacherquery'])->name('teacherquery');
        Route::get('teachersacked/{ref_no}', [UserController::class, 'teachersacked'])->name('teachersacked');
        Route::get('teachersuspend/{ref_no}', [UserController::class, 'teachersuspend'])->name('teachersuspend');
        Route::get('teacherapprove/{ref_no}', [UserController::class, 'teacherapprove'])->name('teacherapprove');
        Route::put('teacherupdated/{ref_no}', [UserController::class, 'teacherupdated'])->name('teacherupdated');
        Route::get('editteacher/{ref_no}', [UserController::class, 'editteacher'])->name('editteacher');
        Route::get('viewsingleteacher/{ref_no}', [UserController::class, 'viewsingleteacher'])->name('viewsingleteacher');
        Route::get('viewteachers', [UserController::class, 'viewteachers'])->name('viewteachers');
        Route::put('assignteachertoclass/{ref_no}', [UserController::class, 'assignteachertoclass'])->name('assignteachertoclass');
        Route::get('/assignedteacher/{centername}', [UserController::class, 'assignedteacher'])->name('assignedteacher');
        Route::post('printclasses', [UserController::class, 'printclasses'])->name('printclasses');
        Route::get('viewsubject', [SubjectController::class, 'viewsubject'])->name('viewsubject');
        Route::post('createsubject', [SubjectController::class, 'createsubject'])->name('createsubject');
        Route::get('addsubject', [SubjectController::class, 'addsubject'])->name('addsubject');
        Route::get('/classrooms/{name}', [ClassnameController::class, 'classrooms'])->name('classrooms');
        Route::get('/classesdelete/{id}', [ClassnameController::class, 'classesdelete'])->name('classesdelete');
        Route::put('/updateclass/{id}', [ClassnameController::class, 'updateclass'])->name('updateclass');
        Route::get('/editclasses/{id}', [ClassnameController::class, 'editclasses'])->name('editclasses');
        Route::post('/createclasses', [ClassnameController::class, 'createclasses'])->name('createclasses');
        Route::get('/viewclassestables', [ClassnameController::class, 'viewclassestables'])->name('viewclassestables');
        Route::get('/addclass', [ClassnameController::class, 'addclass'])->name('addclass');
    
        Route::get('/studycenter1', [StudycenterController::class, 'studycenter1'])->name('studycenter1');
        Route::post('/createstudycenter', [StudycenterController::class, 'createstudycenter'])->name('createstudycenter');
        Route::get('/studycentertables', [StudycenterController::class, 'studycentertables'])->name('studycentertables');
        Route::get('/studycentapproved/{id}', [StudycenterController::class, 'studycentapproved'])->name('studycentapproved');
        Route::get('/studycentsuspend/{id}', [StudycenterController::class, 'studycentsuspend'])->name('studycentsuspend');
        Route::get('/studycentdelete/{id}', [StudycenterController::class, 'studycentdelete'])->name('studycentdelete');
        Route::post('/createam', [TeamController::class, 'createam'])->name('createam');
        Route::get('/addteam', [TeamController::class, 'addteam'])->name('addteam');
        Route::get('/viewteam', [TeamController::class, 'viewteam'])->name('viewteam');
        Route::get('/viewsingteam/{ref_no}', [TeamController::class, 'viewsingteam'])->name('viewsingteam');
        Route::get('/editteam/{id}', [TeamController::class, 'editteam'])->name('editteam');
        Route::put('/updateteam/{id}', [TeamController::class, 'updateteam'])->name('updateteam');
        Route::get('/teamsuspend/{ref_no}', [TeamController::class, 'teamsuspend'])->name('teamsuspend');
        Route::get('/teamapproved/{ref_no}', [TeamController::class, 'teamapproved'])->name('teamapproved');
        Route::get('/teamsacked/{ref_no}', [TeamController::class, 'teamsacked'])->name('teamsacked');
        Route::get('/staffdelete/{ref_no}', [TeamController::class, 'staffdelete'])->name('staffdelete');
        
        Route::put('/createrol/{id}', [UserController::class, 'createrol'])->name('createrol');
        Route::get('/addrole/{id}', [UserController::class, 'addrole'])->name('addrole');
        Route::get('/viewroles', [UserController::class, 'viewroles'])->name('viewroles');
        Route::get('/addevent', [EventController::class, 'addevent'])->name('addevent');
        Route::get('/createteevent', [EventController::class, 'createteevent'])->name('createteevent');
        Route::get('/viewevents', [EventController::class, 'viewevents'])->name('viewevents');
        Route::get('/eventview/{ref_no}', [EventController::class, 'eventview'])->name('eventview');
        Route::get('/eventedit/{ref_no}', [EventController::class, 'eventedit'])->name('eventedit');
        Route::put('/updateevent/{ref_no}', [EventController::class, 'updateevent'])->name('updateevent');
        Route::get('/eventeapproved/{ref_no}', [EventController::class, 'eventeapproved'])->name('eventeapproved');
        Route::get('/eventesuspend/{ref_no}', [EventController::class, 'eventesuspend'])->name('eventesuspend');
        Route::get('/eventedelete/{ref_no}', [EventController::class, 'eventedelete'])->name('eventedelete');
        Route::get('/eventedelete/{ref_no}', [EventController::class, 'eventedelete'])->name('eventedelete');
        Route::get('/addblog', [BlogController::class, 'addblog'])->name('addblog');
        Route::get('/viewblog', [BlogController::class, 'viewblog'])->name('viewblog');
        Route::post('/createblog', [BlogController::class, 'createblog'])->name('createblog');
        Route::get('/blogview/{ref_no}', [BlogController::class, 'blogview'])->name('blogview');
        Route::get('/blogedit/{ref_no}', [BlogController::class, 'blogedit'])->name('blogedit');
        Route::put('/updateblog/{ref_no}', [BlogController::class, 'updateblog'])->name('updateblog');
        Route::get('/blogeapproved/{ref_no}', [BlogController::class, 'blogeapproved'])->name('blogeapproved');
        Route::get('/blogesuspend/{ref_no}', [BlogController::class, 'blogesuspend'])->name('blogesuspend');
        Route::get('/blogedelete/{ref_no}', [BlogController::class, 'blogedelete'])->name('blogedelete');
        Route::get('/addgallery', [GalleryController::class, 'addgallery'])->name('addgallery');
        Route::post('/createtgallery', [GalleryController::class, 'createtgallery'])->name('createtgallery');
        Route::get('/viewgallery', [GalleryController::class, 'viewgallery'])->name('viewgallery');
        Route::get('/galleryedit/{id}', [GalleryController::class, 'galleryedit'])->name('galleryedit');
        Route::put('/updategallery/{id}', [GalleryController::class, 'updategallery'])->name('updategallery');
        Route::get('/gallerydelete/{id}', [GalleryController::class, 'gallerydelete'])->name('gallerydelete');
        
        Route::get('/addfacility', [FacilityController::class, 'addfacility'])->name('addfacility');
        Route::post('/createfacility', [FacilityController::class, 'createfacility'])->name('createfacility');
        Route::get('/viewfacility', [FacilityController::class, 'viewfacility'])->name('viewfacility');
        Route::get('/facilityedit/{id}', [FacilityController::class, 'facilityedit'])->name('facilityedit');
        Route::put('/updatefacility/{id}', [FacilityController::class, 'updatefacility'])->name('updatefacility');
        Route::get('/facilitydelete/{id}', [FacilityController::class, 'facilitydelete'])->name('facilitydelete');
        
        Route::get('/viewmainslider', [MainsliderController::class, 'viewmainslider'])->name('viewmainslider');
        Route::get('/addmainslider', [MainsliderController::class, 'addmainslider'])->name('addmainslider');
        Route::post('/createteslider', [MainsliderController::class, 'createteslider'])->name('createteslider');
        Route::get('/slideredit/{id}', [MainsliderController::class, 'slideredit'])->name('slideredit');
        Route::put('/updateslider/{id}', [MainsliderController::class, 'updateslider'])->name('updateslider');
        Route::get('/slideredelete/{id}', [MainsliderController::class, 'slideredelete'])->name('slideredelete');
        
        Route::get('/adminprogress', [UserController::class, 'adminprogress'])->name('adminprogress');
        Route::get('/viewstudents/{ref_no}', [UserController::class, 'viewstudents'])->name('viewstudents');
        Route::get('/editstudent/{id}', [UserController::class, 'editstudent'])->name('editstudent');
        Route::put('/updateadmission/{ref_no}', [UserController::class, 'updateadmission'])->name('updateadmission');
        Route::get('/rejectstudent/{ref_no}', [UserController::class, 'rejectstudent'])->name('rejectstudent');
        
        Route::get('rejectedstudent', [UserController::class, 'rejectedstudent'])->name('rejectedstudent');
        Route::get('studentsapprove/{ref_no}', [UserController::class, 'studentsapprove'])->name('studentsapprove');
        Route::get('suspendstudent/{ref_no}', [UserController::class, 'suspendstudent'])->name('suspendstudent');
        Route::get('suspendstudents', [UserController::class, 'suspendstudents'])->name('suspendstudents');
        Route::get('studentsaddmit/{ref_no}', [UserController::class, 'studentsaddmit'])->name('studentsaddmit');
        Route::get('admittedstudents', [UserController::class, 'admittedstudents'])->name('admittedstudents');
        Route::get('allstudents', [UserController::class, 'allstudents'])->name('allstudents');
        Route::get('deletestudent/{ref_no}', [UserController::class, 'deletestudent'])->name('deletestudent');
        Route::get('/addregno/{id}', [UserController::class, 'addregno'])->name('addregno');
        Route::put('/addingregno/{id}', [UserController::class, 'addingregno'])->name('addingregno');
        Route::get('/studentpdf/{ref_no}', [UserController::class, 'studentpdf'])->name('studentpdf');
        Route::get('/medicalspdf/{ref_no}', [UserController::class, 'medicalspdf'])->name('medicalspdf');
        Route::get('/allstudentpdf', [UserController::class, 'allstudentpdf'])->name('allstudentpdf');
        Route::get('/allcrechepdf', [UserController::class, 'allcrechepdf'])->name('allcrechepdf');
        Route::get('/allnurserypdf', [UserController::class, 'allnurserypdf'])->name('allnurserypdf');
        Route::get('/allprimarypdf', [UserController::class, 'allprimarypdf'])->name('allprimarypdf');
        Route::get('/allhighschpdf', [UserController::class, 'allhighschpdf'])->name('allhighschpdf');
        Route::get('/viewalluyo', [UserController::class, 'viewalluyo'])->name('viewalluyo');
        Route::get('/alluyocrechepdf', [UserController::class, 'alluyocrechepdf'])->name('alluyocrechepdf');
        Route::get('/alluyopreperatorypdf', [UserController::class, 'alluyopreperatorypdf'])->name('alluyopreperatorypdf');
        Route::get('/allpreschoolpdf', [UserController::class, 'allpreschoolpdf'])->name('allpreschoolpdf');
        Route::get('/alluyonurserypdf', [UserController::class, 'alluyonurserypdf'])->name('alluyonurserypdf');
        Route::get('/alluyoprimarypdf', [UserController::class, 'alluyoprimarypdf'])->name('alluyoprimarypdf');
        Route::get('/alluyohighschpdf', [UserController::class, 'alluyohighschpdf'])->name('alluyohighschpdf');
        Route::get('/alluyocentpdf', [UserController::class, 'alluyocentpdf'])->name('alluyocentpdf');
        Route::get('/viewpreparatory', [UserController::class, 'viewpreparatory'])->name('viewpreparatory');
        Route::get('/viewpreschool', [UserController::class, 'viewpreschool'])->name('viewpreschool');
        Route::get('/viewnursery', [UserController::class, 'viewnursery'])->name('viewnursery');
        Route::get('/viewprimary', [UserController::class, 'viewprimary'])->name('viewprimary');
        Route::get('/viewhighschool', [UserController::class, 'viewhighschool'])->name('viewhighschool');
        Route::get('/viewallabuja', [UserController::class, 'viewallabuja'])->name('viewallabuja');
        Route::get('/allabujacrechepdf', [UserController::class, 'allabujacrechepdf'])->name('allabujacrechepdf');
        Route::get('/allabujapdf', [UserController::class, 'allabujapdf'])->name('allabujapdf');
        Route::get('/allabujapreperatorypdf', [UserController::class, 'allabujapreperatorypdf'])->name('allabujapreperatorypdf');
        Route::get('/allabujapreschoolpdf', [UserController::class, 'allabujapreschoolpdf'])->name('allabujapreschoolpdf');
        Route::get('/allabujanurserypdf', [UserController::class, 'allabujanurserypdf'])->name('allabujanurserypdf');
        Route::get('/allabujaprimarypdf', [UserController::class, 'allabujaprimarypdf'])->name('allabujaprimarypdf');
        Route::get('/allabujahighschpdf', [UserController::class, 'allabujahighschpdf'])->name('allabujahighschpdf');
        Route::get('/viewabujapreparatory', [UserController::class, 'viewabujapreparatory'])->name('viewabujapreparatory');
        Route::get('/abujapreschool', [UserController::class, 'abujapreschool'])->name('abujapreschool');
        Route::get('/viewabujanursery', [UserController::class, 'viewabujanursery'])->name('viewabujanursery');
        Route::get('/viewabujaprimary', [UserController::class, 'viewabujaprimary'])->name('viewabujaprimary');
        Route::get('/viewabjhighschool', [UserController::class, 'viewabjhighschool'])->name('viewabjhighschool');
        Route::post('/createparent', [StudentParentController::class, 'createparent'])->name('createparent');
        Route::get('/viewparents', [StudentParentController::class, 'viewparents'])->name('viewparents');
        Route::get('/viewparent/{ref_no}', [StudentParentController::class, 'viewparent'])->name('viewparent');
        Route::get('/editparent/{ref_no}', [StudentParentController::class, 'editparent'])->name('editparent');
        Route::put('/updateparent/{ref_no}', [StudentParentController::class, 'updateparent'])->name('updateparent');
        Route::get('/addchild/{id}', [StudentParentController::class, 'addchild'])->name('addchild');
        Route::post('/add_childto_parents', [UserController::class, 'add_childto_parents'])->name('add_childto_parents');
        
        
        
         
        Route::get('/testimonyedelete/{id}', [TestimonyController::class, 'testimonyedelete'])->name('testimonyedelete');
        Route::get('/testimonyesuspend/{id}', [TestimonyController::class, 'testimonyesuspend'])->name('testimonyesuspend');
        Route::get('/testimonyeapproved/{id}', [TestimonyController::class, 'testimonyeapproved'])->name('testimonyeapproved');
        Route::put('/updatetestimony/{id}', [TestimonyController::class, 'updatetestimony'])->name('updatetestimony');
        Route::get('/testimonyedit/{id}', [TestimonyController::class, 'testimonyedit'])->name('testimonyedit');
        Route::get('/testimonyview/{id}', [TestimonyController::class, 'testimonyview'])->name('testimonyview');
        Route::get('/addtestimony', [TestimonyController::class, 'addtestimony'])->name('addtestimony');
        Route::get('/allsubjects', [SubjectController::class, 'allsubjects'])->name('allsubjects');
        Route::get('/setsubjectquestions', [SubjectController::class, 'setsubjectquestions'])->name('setsubjectquestions');
        Route::get('/addquestions/{id}', [SubjectController::class, 'addquestions'])->name('addquestions');
        Route::post('/addquestions', [QuestionController::class, 'addquestions'])->name('addquestions');
        Route::post('/addbyadminquestion', [QuestionController::class, 'addbyadminquestion'])->name('addbyadminquestion');
        Route::get('/questionbyadmin', [QuestionController::class, 'questionbyadmin'])->name('questionbyadmin');
        Route::get('/viewsinglequestionz/{id}', [QuestionController::class, 'viewsinglequestionz'])->name('viewsinglequestionz');
        Route::get('/editquestionzadmin/{id}', [QuestionController::class, 'editquestionzadmin'])->name('editquestionzadmin');
        Route::get('/questionzapprove/{id}', [QuestionController::class, 'questionzapprove'])->name('questionzapprove');
        Route::get('/questionzsunapprove/{id}', [QuestionController::class, 'questionzsunapprove'])->name('questionzsunapprove');
        Route::put('/updateadminquestion/{id}', [QuestionController::class, 'updateadminquestion'])->name('updateadminquestion');
        Route::get('/uyoquestions', [QuestionController::class, 'uyoquestions'])->name('uyoquestions');
        Route::get('/abujaquestions', [QuestionController::class, 'abujaquestions'])->name('abujaquestions');
        Route::get('/teachersquestion/{user_id}', [QuestionController::class, 'teachersquestion'])->name('teachersquestion');
        
        
        Route::get('/addnidnetcoursesl1stsem', [RegistercourseController::class, 'addnidnetcoursesl1stsem'])->name('addnidnetcoursesl1stsem');
        Route::get('/viewnetworkcourses', [RegistercourseController::class, 'viewnetworkcourses'])->name('viewnetworkcourses');
        Route::get('/print1stinglepaymentspdf/{id}', [StudentController::class, 'print1stinglepaymentspdf'])->name('print1stinglepaymentspdf');
        Route::get('/viewallpaymentfirst', [StudentController::class, 'viewallpaymentfirst'])->name('viewallpaymentfirst');
        Route::get('/print1stinglepaymentspdfgf', [StudentController::class, 'print1stinglepaymentspdfgf'])->name('print1stinglepaymentspdfgf');
        Route::get('/nidhardwarelevel200course', [RegistercourseController::class, 'nidhardwarelevel200course'])->name('nidhardwarelevel200course');
        Route::get('/addnidhardcourses200', [RegistercourseController::class, 'addnidhardcourses200'])->name('addnidhardcourses200');
        Route::get('/addnidmanagecourses100', [RegistercourseController::class, 'addnidmanagecourses100'])->name('addnidmanagecourses100');
        Route::get('/viewnidmanagecourses', [RegistercourseController::class, 'viewnidmanagecourses'])->name('viewnidmanagecourses');
        Route::get('/addnidmanagecourses200', [RegistercourseController::class, 'addnidmanagecourses200'])->name('addnidmanagecourses200');
        Route::get('/nidmanagelevel200course', [RegistercourseController::class, 'nidmanagelevel200course'])->name('nidmanagelevel200course');
        
        Route::get('/addnidsoft2ndsem', [RegistercourseController::class, 'addnidsoft2ndsem'])->name('addnidsoft2ndsem');
        Route::get('/addnidsoftcourses2l', [RegistercourseController::class, 'addnidsoftcourses2l'])->name('addnidsoftcourses2l');
        Route::get('/addnidschoolfees', [AddnidfeeController::class, 'addnidschoolfees'])->name('addnidschoolfees');
        Route::post('/addfeesfornid', [AddnidfeeController::class, 'addfeesfornid'])->name('addfeesfornid');
        Route::get('/nidschfees', [AddnidfeeController::class, 'nidschfees'])->name('nidschfees');
        
        Route::post('/createtestimony', [TestimonyController::class, 'createtestimony'])->name('createtestimony');
        Route::get('/addtestimony', [TestimonyController::class, 'addtestimony'])->name('addtestimony');
        Route::get('/viewtestimony', [TestimonyController::class, 'viewtestimony'])->name('viewtestimony');
        Route::get('/testimonyview/{id}', [TestimonyController::class, 'testimonyview'])->name('testimonyview');
        Route::get('/testimonyedit/{id}', [TestimonyController::class, 'testimonyedit'])->name('testimonyedit');
        Route::put('/updatetestimony/{id}', [TestimonyController::class, 'updatetestimony'])->name('updatetestimony');
        Route::get('/testimonyeapproved/{id}', [TestimonyController::class, 'testimonyeapproved'])->name('testimonyeapproved');
        Route::get('/testimonyesuspend/{id}', [TestimonyController::class, 'testimonyesuspend'])->name('testimonyesuspend');
        Route::get('/testimonyedelete/{id}', [TestimonyController::class, 'testimonyedelete'])->name('testimonyedelete');
        Route::get('/addevent', [EventController::class, 'addevent'])->name('addevent');
        Route::post('/createteevent', [EventController::class, 'createteevent'])->name('createteevent');
        Route::get('/viewevents', [EventController::class, 'viewevents'])->name('viewevents');
        Route::get('/eventeapproved/{slug}', [EventController::class, 'eventeapproved'])->name('eventeapproved');
        Route::get('/eventesuspend/{slug}', [EventController::class, 'eventesuspend'])->name('eventesuspend');
        Route::get('/professionals', [CourseController::class, 'professionals'])->name('professionals');
        Route::get('/addcource', [CourseController::class, 'addcource'])->name('addcource');
        Route::get('/addnidcourses', [RegistercourseController::class, 'addnidcourses'])->name('addnidcourses');
        Route::get('/viewnidcources', [RegistercourseController::class, 'viewnidcources'])->name('viewnidcources');
        Route::get('/addnidsoftcourses', [RegistercourseController::class, 'addnidsoftcourses'])->name('addnidsoftcourses');
        Route::get('/nidsoftlevel200courses', [RegistercourseController::class, 'nidsoftlevel200courses'])->name('nidsoftlevel200courses');
        Route::get('/addnidsoft2ndsemleve200', [RegistercourseController::class, 'addnidsoft2ndsemleve200'])->name('addnidsoft2ndsemleve200');
        
        Route::get('/nsq', [CourseController::class, 'nsq'])->name('nsq');
        Route::get('/addnid', [CourseController::class, 'addnid'])->name('addnid');
        Route::get('/imficca', [CourseController::class, 'imficca'])->name('imficca');
        Route::get('/nidnetworklevel200course', [RegistercourseController::class, 'nidnetworklevel200course'])->name('nidnetworklevel200course');
        Route::get('/addnidnet2ndsem1leve200', [RegistercourseController::class, 'addnidnet2ndsem1leve200'])->name('addnidnet2ndsem1leve200');
        Route::get('/addnidnetsem2leve200l', [RegistercourseController::class, 'addnidnetsem2leve200l'])->name('addnidnetsem2leve200l');
        Route::get('/addnidhardcourses100', [RegistercourseController::class, 'addnidhardcourses100'])->name('addnidhardcourses100');
        Route::get('/viewardwarecourses', [RegistercourseController::class, 'viewardwarecourses'])->name('viewardwarecourses');
        
        Route::post('/creatprofessional', [ProfessionalController::class, 'creatprofessional'])->name('creatprofessional');
        Route::get('/viewprofessional', [ProfessionalController::class, 'viewprofessional'])->name('viewprofessional');
        Route::get('/courseviewprof/{slug}', [ProfessionalController::class, 'courseviewprof'])->name('courseviewprof');
        Route::get('/programedit/{slug}', [ProfessionalController::class, 'programedit'])->name('programedit');
        Route::put('/updateprofprograms/{slug}', [ProfessionalController::class, 'updateprofprograms'])->name('updateprofprograms');
        Route::get('/profpromapproved/{slug}', [ProfessionalController::class, 'profpromapproved']);
        Route::get('/profpromsuspend/{slug}', [ProfessionalController::class, 'profpromsuspend']);
        Route::get('/downloadprofprom', [ProfessionalController::class, 'downloadprofprom'])->name('downloadprofprom');
        Route::get('/profpromdelete/{slug}', [ProfessionalController::class, 'profpromdelete']);
        
        Route::view('/home','dashboard.admin.home')->name('home');
        
        Route::get('/addnidsoft2ndsem1leve100', [RegistercourseController::class, 'addnidsoft2ndsem1leve100'])->name('addnidsoft2ndsem1leve100');
        Route::post('/createsinglecourse', [RegistercourseController::class, 'createsinglecourse'])->name('createsinglecourse');
        Route::get('/home', [AdminController::class, 'home'])->name('home');
        Route::get('/coursesuspend/{slug}', [CourseController::class, 'coursesuspend']);
        Route::get('/courseapproved/{slug}', [CourseController::class, 'courseapproved']);
        Route::get('/addmt1courses', [RegistercourseController::class, 'addmt1courses'])->name('addmt1courses');
        Route::get('/viewmtcourses', [RegistercourseController::class, 'viewmtcourses'])->name('viewmtcourses');
        Route::get('/editprogramcoursemt/{id}', [RegistercourseController::class, 'editprogramcoursemt'])->name('editprogramcoursemt');
        Route::put('/updatecourse/{id}', [CourseController::class, 'updatecourse'])->name('updatecourse');
        Route::get('/viewcourses',[CourseController::class, 'viewcourses'])->name('viewcourses');
        Route::get('/courseview/{slug}', [CourseController::class, 'courseview'])->name('courseview');
        Route::get('/coursedit/{slug}', [CourseController::class, 'coursedit'])->name('coursedit');
        Route::get('/coursedelete/{slug}', [CourseController::class, 'coursedelete'])->name('coursedelete');
        Route::get('viewsfees/{ref_no}', [StudentController::class, 'viewsfees'])->name('viewsfees');

        Route::get('/viewallpayment', [ProgramregistrationController::class, 'viewallpayment'])->name('viewallpayment');
        Route::get('/viewsinglepayment/{id}', [ProgramregistrationController::class, 'viewsinglepayment'])->name('viewsinglepayment');
        Route::get('/confirmpayment/{id}', [ProgramregistrationController::class, 'confirmpayment']);
        Route::get('/printpdf', [ProgramregistrationController::class, 'printpdf'])->name('printpdf');
        Route::get('/deletepayment/{slug}', [ProgramregistrationController::class, 'deletepayment'])->name('deletepayment');
        Route::get('/printsinglepaymentspdf/{slug}', [ProgramregistrationController::class, 'printsinglepaymentspdf'])->name('printsinglepaymentspdf');
        Route::get('/studentit/{ref_no}', [StudentController::class, 'studentit'])->name('studentit');
        Route::get('/viewstudents/{surname}', [StudentController::class, 'viewstudents'])->name('viewstudents');
        
        Route::get('/certregcourses',[RegistercoursebystudentController::class, 'certregcourses'])->name('certregcourses');
        Route::get('/view/{id}',[RegistercoursebystudentController::class, 'view'])->name('view');
        Route::get('/deleteprogcoursetud/{id}', [RegistercoursebystudentController::class, 'deleteprogcoursetud'])->name('deleteprogcoursetud');
       
        Route::get('approvedstudents', [StudentController::class, 'approvedstudents'])->name('approvedstudents');

        Route::get('/contactdelete/{id}', [ContactController::class, 'contactdelete'])->name('contactdelete');

        Route::get('/legalcontact', [VisitController::class, 'legalcontact'])->name('legalcontact');
        Route::get('/editprogramcourse/{id}', [RegistercourseController::class, 'editprogramcourse'])->name('editprogramcourse');
        Route::get('certindataprocescourse', [RegistercourseController::class, 'certindataprocescourse'])->name('certindataprocescourse');
        Route::get('/printcoursestudentd1', [RegistercourseController::class, 'printcoursestudentd1'])->name('printcoursestudentd1');
        Route::get('/certregcourssd1', [RegistercoursebystudentController::class, 'certregcourssd1'])->name('certregcourssd1');

        Route::get('/editprogramcoursed1/{id}', [RegistercourseController::class, 'editprogramcoursed1'])->name('editprogramcoursed1');

        Route::get('/deleteprogramcourse/{id}', [RegistercourseController::class, 'deleteprogramcourse'])->name('deleteprogramcourse');
        Route::get('/printcoursestudent/{id}',[RegistercourseController::class, 'printcoursestudent'])->name('printcoursestudent');
       
        Route::get('/viewcertindataprocescourse', [RegistercourseController::class, 'viewcertindataprocescourse'])->name('viewcertindataprocescourse');
        Route::put('/updatecreatesinglecourse/{id}', [RegistercourseController::class, 'updatecreatesinglecourse'])->name('updatecreatesinglecourse');
        Route::get('/downloadcourses', [CourseController::class, 'downloadcourses'])->name('downloadcourses');
        
        Route::get('/editprogramcoursestu/{id}', [RegistercoursebystudentController::class, 'editprogramcoursestu'])->name('editprogramcoursestu');

        Route::get('/downloadcourse/{slug}', [CourseController::class, 'downloadcourse'])->name('downloadcourse');
        
        Route::post('/registerforresults',[ResultdataprocessingController::class, 'registerforresults'])->name('registerforresults');
        
        Route::get('/viewlecturers', [LecturerController::class, 'viewlecturers'])->name('viewlecturers');
        Route::get('/lecturerapprove/{ref_no}', [LecturerController::class, 'lecturerapprove'])->name('lecturerapprove');
        Route::get('/lecturersuspend/{ref_no}', [LecturerController::class, 'lecturersuspend'])->name('lecturersuspend');
        Route::get('/approvelecturers', [LecturerController::class, 'approvelecturers'])->name('approvelecturers');
        
        Route::get('/lecturerdelete/{ref_no}', [LecturerController::class, 'lecturerdelete'])->name('lecturerdelete');

        Route::get('/suspendedlecturers', [LecturerController::class, 'suspendedlecturers'])->name('suspendedlecturers');
        Route::get('/viewsinglelecturer/{ref_no}', [LecturerController::class, 'viewsinglelecturer'])->name('viewsinglelecturer');
        Route::get('/editlecturer/{ref_no}', [LecturerController::class, 'editlecturer'])->name('editlecturer');
        Route::get('/lecturersprint/{ref_no}', [LecturerController::class, 'lecturersprint'])->name('lecturersprint');
        Route::put('/lecturerupdated/{ref_no}', [LecturerController::class, 'lecturerupdated'])->name('lecturerupdated');
        Route::get('/lecturers', [LecturerController::class, 'lecturers'])->name('lecturers');
        Route::get('/add1courses', [RegistercourseController::class, 'add1courses'])->name('add1courses');
        Route::put('/settingsupdate/{id}', [AdminController::class, 'settingsupdate'])->name('settingsupdate');
        
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::get('/resultforcertindata', [ResultdataprocessingController::class, 'resultforcertindata'])->name('resultforcertindata');
        
        Route::get('/viewresultd1/{id}', [ResultdataprocessingController::class, 'viewresultd1'])->name('viewresultd1');
        Route::get('/viewresults/{id}', [ResultdataprocessingController::class, 'viewresults'])->name('viewresults');
        Route::get('/printsingleresults/{id}', [ResultdataprocessingController::class, 'printsingleresults'])->name('printsingleresults');
        Route::get('/viewd1courses', [RegistercourseController::class, 'viewd1courses'])->name('viewd1courses');
        
        Route::get('/resultford1', [ResultdataprocessingController::class, 'resultford1'])->name('resultford1');

        Route::get('/logout', [AdminController::class, 'logout'])->name('logout'); 
        
       
    });
});




Route::prefix('web')->name('web.')->group(function() {

    Route::middleware(['guest:web'])->group(function() {
        
        Route::post('/checkfirst', [UserController::class, 'checkfirst'])->name('checkfirst');
    });
    
    Route::middleware(['auth:web'])->group(function() {

        Route::get('/home', [UserController::class, 'home'])->name('home');
        
        Route::get('/mysubjectsguestion', [TeacherassignController::class, 'mysubjectsguestion'])->name('mysubjectsguestion');
        
        Route::get('/editquestion/{id}', [QuestionController::class, 'editquestion'])->name('editquestion');
        Route::put('/updatequestion/{id}', [QuestionController::class, 'updatequestion'])->name('updatequestion');
        
        Route::get('/mysquestions', [QuestionController::class, 'mysquestions'])->name('mysquestions');
        Route::post('/createquestion', [QuestionController::class, 'createquestion'])->name('createquestion');
        Route::get('/setquestion/{id}', [QuestionController::class, 'setquestion'])->name('setquestion');
        Route::get('/viewquestion/{id}', [QuestionController::class, 'viewquestion'])->name('viewquestion');
        Route::get('/viewquestion/{id}', [QuestionController::class, 'viewquestion'])->name('viewquestion');
        Route::get('/printresult/{id}', [ResultController::class, 'printresult'])->name('printresult');
        Route::get('/mysubjects', [TeacherassignController::class, 'mysubjects'])->name('mysubjects');
        Route::post('/yourresult', [ResultController::class, 'yourresult'])->name('yourresult');
        Route::get('/checkresult', [ResultController::class, 'checkresult'])->name('checkresult');
        Route::get('/checkresultterminal', [ResultController::class, 'checkresultterminal'])->name('checkresultterminal');
        Route::get('/teacherviewresults3rd/{id}', [ResultController::class, 'teacherviewresults3rd'])->name('teacherviewresults3rd');
        Route::get('/premiumtermresults', [ResultController::class, 'premiumtermresults'])->name('premiumtermresults');
        Route::get('/teacherviewresults2nd/{id}', [ResultController::class, 'teacherviewresults2nd'])->name('teacherviewresults2nd');
        Route::get('/pensulatermresults', [ResultController::class, 'pensulatermresults'])->name('pensulatermresults');
        Route::get('/addpsychomotor/{user_id}', [ResultController::class, 'addpsychomotor'])->name('addpsychomotor');
        Route::put('/createpsychomotoro/{id}', [ResultController::class, 'createpsychomotoro'])->name('createpsychomotoro');
        Route::post('/createresults/{id}', [ResultController::class, 'createresults'])->name('createresults');
        Route::put('/assignstudentclass/{ref_no}', [UserController::class, 'assignstudentclass'])->name('assignstudentclass');
        Route::get('addresults/{id}', [UserController::class, 'addresults'])->name('addresults');
        Route::get('payment', [SchoolfeeController::class, 'payment'])->name('payment');
        // Route::get('/generate-report', 'ReportController@generateReport');
        Route::post('generatePDF', [ResultController::class, 'generatePDF'])->name('generatePDF');
        //Route::get('generatePdf', [ResultController::class, 'generatePdf'])->name('generatePdf');
        //Route::get('generatePdf', [ResultController::class, 'generatePdf'])->name('generatePdf');
        Route::get('/promotions', [UserController::class, 'promotions'])->name('promotions');
        Route::get('/nurseryschoolheads', [UserController::class, 'nurseryschoolheads'])->name('nurseryschoolheads');
        
        Route::get('/crecheheads', [UserController::class, 'crecheheads'])->name('crecheheads');
        Route::get('/preschoolheads', [UserController::class, 'preschoolheads'])->name('preschoolheads');
        Route::get('/primaryheads', [UserController::class, 'primaryheads'])->name('primaryheads');
        Route::get('/highschools', [UserController::class, 'highschools'])->name('highschools');
        Route::get('/createsection', [UserController::class, 'createsection'])->name('createsection');
        Route::get('/preschoolsection', [UserController::class, 'preschoolsection'])->name('preschoolsection');
        Route::get('/primarysection', [UserController::class, 'primarysection'])->name('primarysection');
        Route::get('/nurserysection', [UserController::class, 'nurserysection'])->name('nurserysection');
        Route::get('/highschoolsection', [UserController::class, 'highschoolsection'])->name('highschoolsection');
        
        Route::get('/classes/{classname}', [ClassnameController::class, 'classes'])->name('classes');
        Route::get('/queryrepliedview', [QueryController::class, 'queryrepliedview'])->name('queryrepliedview');
        Route::get('/printquery1/{id}', [QueryController::class, 'printquery1'])->name('printquery1');
        Route::put('/replyquery/{id}', [QueryController::class, 'replyquery'])->name('replyquery');
        Route::get('/viewqueryreply/{id}', [QueryController::class, 'viewqueryreply'])->name('viewqueryreply');
        Route::get('/viewquery/{id}', [QueryController::class, 'viewquery'])->name('viewquery');
        Route::get('/checkyourquery', [QueryController::class, 'checkyourquery'])->name('checkyourquery');
        Route::get('/teacherviewresults/{user_id}', [ResultController::class, 'teacherviewresults'])->name('teacherviewresults');
        Route::get('/pioneertermresults', [ResultController::class, 'pioneertermresults'])->name('pioneertermresults');
        Route::get('/premiumterm', [UserController::class, 'premiumterm'])->name('premiumterm');
        Route::get('/pioneerterm', [UserController::class, 'pioneerterm'])->name('pioneerterm');
        Route::get('/penultimateterm', [UserController::class, 'penultimateterm'])->name('penultimateterm');
        Route::get('/profile/{ref_no}', [UserController::class, 'profile'])->name('profile');
        Route::get('/admisionletter', [UserController::class, 'admisionletter'])->name('classesdelete');
        Route::get('assignedstudent/{ref_no}', [UserController::class, 'assignedstudent'])->name('assignedstudent');
        
        Route::get('/logout', [UserController::class, 'logout'])->name('logout'); 
        
       
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');



//Route::post('/checkfirst', [UserController::class, 'checkfirst'])->name('checkfirst');

Route::get('/registerteacher', [UserController::class, 'registerteacher'])->name('registerteacher');

Route::post('/createteacher', [UserController::class, 'createteacher'])->name('createteacher');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//require __DIR__.'/auth.php';