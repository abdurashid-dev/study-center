<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupTime;
use App\Models\Student;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FrontendController extends Controller
{
    public function welcome()
    {
        SEOMeta::setTitle('Hurmatulloh group');
        SEOMeta::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        SEOMeta::setCanonical(route('welcome'));

        OpenGraph::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        OpenGraph::setTitle('Hurmatulloh group');
        OpenGraph::setUrl(route('welcome'));
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(asset('logo.png'));

        JsonLd::setTitle('Hurmatulloh group');
        JsonLd::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        JsonLd::addImage(asset('logo.png'));

        return view('welcome');
    }

    public function search(Request $request)
    {
        SEOMeta::setTitle('Hurmatulloh group');
        SEOMeta::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        SEOMeta::setCanonical(route('welcome'));

        OpenGraph::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        OpenGraph::setTitle('Hurmatulloh group');
        OpenGraph::setUrl(route('welcome'));
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(asset('logo.png'));

        JsonLd::setTitle('Hurmatulloh group');
        JsonLd::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        JsonLd::addImage(asset('logo.png'));
        if ($request->q) {
            $q = $request->get('q');
            $students = Student::globalSearch($request->q)->get();
            return view('frontend.search', compact('students', 'q'));
        } else {
            return redirect()->route('welcome');
        }
    }

    public function dtm()
    {
        SEOMeta::setTitle('Hurmatulloh group');
        SEOMeta::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        SEOMeta::setCanonical(route('welcome'));

        OpenGraph::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        OpenGraph::setTitle('Hurmatulloh group');
        OpenGraph::setUrl(route('welcome'));
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(asset('logo.png'));

        JsonLd::setTitle('Hurmatulloh group');
        JsonLd::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        JsonLd::addImage(asset('logo.png'));
        return view('frontend.dtm');
    }

    public function info()
    {
        return view('frontend.info');
    }

    public function calendarIndex()
    {
        SEOMeta::setTitle('Hurmatulloh group');
        SEOMeta::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        SEOMeta::setCanonical(route('welcome'));

        OpenGraph::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        OpenGraph::setTitle('Hurmatulloh group');
        OpenGraph::setUrl(route('welcome'));
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(asset('logo.png'));

        JsonLd::setTitle('Hurmatulloh group');
        JsonLd::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        JsonLd::addImage(asset('logo.png'));
        $groups = Group::paginate(20);
        return view('frontend.calendar.index', compact('groups'));
    }

    public function calendarShow($slug)
    {
        SEOMeta::setTitle('Hurmatulloh group');
        SEOMeta::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        SEOMeta::setCanonical(route('welcome'));

        OpenGraph::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        OpenGraph::setTitle('Hurmatulloh group');
        OpenGraph::setUrl(route('welcome'));
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(asset('logo.png'));

        JsonLd::setTitle('Hurmatulloh group');
        JsonLd::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        JsonLd::addImage(asset('logo.png'));
        $group = Group::where('slug', $slug)->first();
        $group_times = GroupTime::where('group_id', $group->id)->get();
        return view('frontend.calendar.show', compact('group_times', 'group'));
    }

    public function result($student)
    {
        SEOMeta::setTitle('Hurmatulloh group');
        SEOMeta::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        SEOMeta::setCanonical(route('welcome'));

        OpenGraph::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        OpenGraph::setTitle('Hurmatulloh group');
        OpenGraph::setUrl(route('welcome'));
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(asset('logo.png'));

        JsonLd::setTitle('Hurmatulloh group');
        JsonLd::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        JsonLd::addImage(asset('logo.png'));
        $student = Student::with('groups', 'phones', 'balance')
            //last 7 attendances
            ->with(['attendances' => function ($query) {
                $start_day = Carbon::now()->subdays(7);
                $today = Carbon::now();
                $query->whereBetween('created_at', [$start_day, $today]);
            }])
            //last 3 months payments
            ->with(['payments' => function ($query) {
                $query->where('created_at', '>=', now()->subMonths(3))->orderBy('created_at', 'desc');
            }])
            ->where('slug', $student)->first();
        if ($student->payments->sum('discount') > 0) {
            $discount_area = true;
        } else {
            $discount_area = false;
        }

        return view('frontend.result', compact('student', 'discount_area'));
    }

    public function attendance($student)
    {
        SEOMeta::setTitle('Hurmatulloh group');
        SEOMeta::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        SEOMeta::setCanonical(route('welcome'));

        OpenGraph::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        OpenGraph::setTitle('Hurmatulloh group');
//        OpenGraph::setUrl(route('welcome'));
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(asset('logo.png'));

        JsonLd::setTitle('Hurmatulloh group');
        JsonLd::setDescription('Hurmatulloh group rasmiy sayti. Hurmatulloh group o`quvchilari haqidagi ma`lumotlarni ota-onalar bilan almashish uchun ishlab chiqilgan tizim. All rights reserved by Abdurashid');
        JsonLd::addImage(asset('logo.png'));
        $student = Student::where('slug', $student)
            ->with(['attendances' => function ($query) {
                $last_three_month = Carbon::now()->startOfMonth()->subMonth(3);
                $this_month = Carbon::now()->startOfMonth();
                $query->whereBetween('created_at', [$last_three_month, $this_month])->get();
            }])
            ->first();
        return view('frontend.attendance', compact('student'));
    }
}
