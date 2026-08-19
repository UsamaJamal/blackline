<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FaqController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/services', [\App\Http\Controllers\ServicePageController::class, 'index'])->name('services');
Route::get('/services/{slug}', [\App\Http\Controllers\ServicePageController::class, 'show'])->name('services.show');
Route::get('/portfolio', [\App\Http\Controllers\PortfolioController::class, 'index'])->name('portfolio');
Route::get('/case-study', [CaseStudyController::class, 'index'])->name('case-study');
Route::get('/case-study/{slug}', [CaseStudyController::class, 'show'])->name('case-study.show');
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog-post');
Route::view('/contact-us', 'contact')->name('contact');
Route::get('/book-now', [\App\Http\Controllers\BookNowController::class, 'index'])->name('book-now');
Route::post('/book-now', [\App\Http\Controllers\BookNowController::class, 'store'])->name('book-now.store');

Route::prefix('admin')->group(function () {
    Route::get('login', [\App\Http\Controllers\AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [\App\Http\Controllers\AdminAuthController::class, 'login']);

    Route::middleware(['admin'])->group(function () {
        Route::get('dashboard', [\App\Http\Controllers\AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('logout', [\App\Http\Controllers\AdminAuthController::class, 'logout'])->name('admin.logout');

        // Hero Section Management
        Route::get('home-hero', [\App\Http\Controllers\AdminHeroController::class, 'edit'])->name('admin.home-hero');
        Route::post('home-hero', [\App\Http\Controllers\AdminHeroController::class, 'update'])->name('admin.home-hero.update');

        // Portfolio Management
        Route::get('portfolio-hero', [\App\Http\Controllers\AdminPortfolioController::class, 'edit'])->name('admin.portfolio-hero');
        Route::post('portfolio-hero', [\App\Http\Controllers\AdminPortfolioController::class, 'update'])->name('admin.portfolio-hero.update');
        Route::resource('portfolio/items', \App\Http\Controllers\AdminPortfolioItemController::class)->names('admin.portfolio.items')->except(['show']);
        Route::post('portfolio/items/{id}/set-order', [\App\Http\Controllers\AdminPortfolioItemController::class, 'setOrder'])->name('admin.portfolio.items.set-order');

        // Dynamic Case Study Pages Management
        Route::get('case-study-pages', [\App\Http\Controllers\AdminCaseStudyPageController::class, 'index'])->name('admin.case-study-pages.index');
        Route::post('case-study-pages', [\App\Http\Controllers\AdminCaseStudyPageController::class, 'store'])->name('admin.case-study-pages.store');
        Route::delete('case-study-pages/{id}', [\App\Http\Controllers\AdminCaseStudyPageController::class, 'destroy'])->name('admin.case-study-pages.destroy');
        Route::get('case-study-pages/{slug}/edit', [\App\Http\Controllers\AdminCaseStudyPageController::class, 'edit'])->name('admin.case-study-pages.edit');
        Route::post('case-study-pages/{slug}/update', [\App\Http\Controllers\AdminCaseStudyPageController::class, 'update'])->name('admin.case-study-pages.update');
        Route::resource('home-case-studies', \App\Http\Controllers\AdminCaseStudyController::class)->names('admin.case-studies')->except(['show']);

        // FAQs routes
        Route::resource('faqs', \App\Http\Controllers\AdminFaqController::class)->names([
            'index' => 'admin.faqs.index',
            'create' => 'admin.faqs.create',
            'store' => 'admin.faqs.store',
            'edit' => 'admin.faqs.edit',
            'update' => 'admin.faqs.update',
            'destroy' => 'admin.faqs.destroy',
        ]);

        // Feedbacks Management
        Route::resource('home-feedbacks', \App\Http\Controllers\AdminFeedbackController::class)->names('admin.feedbacks')->except(['show']);

        // Dynamic Service Pages Management
        Route::get('services', [\App\Http\Controllers\AdminServicePageController::class, 'index'])->name('admin.services.index');
        Route::post('services', [\App\Http\Controllers\AdminServicePageController::class, 'store'])->name('admin.services.store');
        Route::delete('services/{id}', [\App\Http\Controllers\AdminServicePageController::class, 'destroy'])->name('admin.services.destroy');

        // Dynamic Nested Service Configuration routes
        Route::prefix('services/{slug}')->group(function() {
            Route::get('hero', [\App\Http\Controllers\AdminServicePageController::class, 'editHero'])->name('admin.services.hero');
            Route::post('hero', [\App\Http\Controllers\AdminServicePageController::class, 'updateHero'])->name('admin.services.hero.update');

            Route::get('overview', [\App\Http\Controllers\AdminServicePageController::class, 'editOverview'])->name('admin.services.overview');
            Route::post('overview', [\App\Http\Controllers\AdminServicePageController::class, 'updateOverview'])->name('admin.services.overview.update');

            Route::get('seo', [\App\Http\Controllers\AdminServicePageController::class, 'editSeo'])->name('admin.services.seo');
            Route::post('seo', [\App\Http\Controllers\AdminServicePageController::class, 'updateSeo'])->name('admin.services.seo.update');

            Route::post('benefits/header', [\App\Http\Controllers\AdminServicePageController::class, 'updateBenefitsHeader'])->name('admin.services.benefits.header');
            Route::resource('benefits', \App\Http\Controllers\AdminServiceBenefitController::class)->names('admin.services.benefits')->except(['show']);

            Route::post('process/header', [\App\Http\Controllers\AdminServicePageController::class, 'updateProcessHeader'])->name('admin.services.process.header');
            Route::resource('process', \App\Http\Controllers\AdminServiceProcessController::class)->names('admin.services.process')->except(['show']);

            Route::post('pricing/header', [\App\Http\Controllers\AdminServicePageController::class, 'updatePricingHeader'])->name('admin.services.pricing.header');
            Route::resource('pricing', \App\Http\Controllers\AdminServicePricingController::class)->names('admin.services.pricing')->except(['show']);
        });

        // Blogs Management
        Route::resource('blogs', \App\Http\Controllers\AdminBlogController::class)->names([
            'index' => 'admin.blogs.index',
            'create' => 'admin.blogs.create',
            'store' => 'admin.blogs.store',
            'edit' => 'admin.blogs.edit',
            'update' => 'admin.blogs.update',
            'destroy' => 'admin.blogs.destroy',
        ]);

        // Authors Management
        Route::resource('authors', \App\Http\Controllers\AdminAuthorController::class)->names([
            'index' => 'admin.authors.index',
            'create' => 'admin.authors.create',
            'store' => 'admin.authors.store',
            'edit' => 'admin.authors.edit',
            'update' => 'admin.authors.update',
            'destroy' => 'admin.authors.destroy',
        ]);

        // SEO Settings
        Route::get('seo-settings', [\App\Http\Controllers\AdminSeoController::class, 'edit'])->name('admin.seo-settings');
        Route::post('seo-settings', [\App\Http\Controllers\AdminSeoController::class, 'update'])->name('admin.seo-settings.update');

        // Contact Settings
        Route::get('contact-settings', [\App\Http\Controllers\AdminContactSettingsController::class, 'edit'])->name('admin.contact-settings');
        Route::post('contact-settings', [\App\Http\Controllers\AdminContactSettingsController::class, 'update'])->name('admin.contact-settings.update');

        // Footer Settings
        Route::get('footer-settings', [\App\Http\Controllers\AdminFooterSettingsController::class, 'edit'])->name('admin.footer-settings');
        Route::post('footer-settings', [\App\Http\Controllers\AdminFooterSettingsController::class, 'update'])->name('admin.footer-settings.update');

        // Appointments Settings
        Route::get('appointments', [\App\Http\Controllers\AdminAppointmentController::class, 'index'])->name('admin.appointments.index');
        Route::delete('appointments/{id}', [\App\Http\Controllers\AdminAppointmentController::class, 'destroy'])->name('admin.appointments.destroy');
    });
});
