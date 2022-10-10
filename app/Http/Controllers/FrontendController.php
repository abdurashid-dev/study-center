<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

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
        $groups = Group::paginate(20);
        return view('frontend.calendar.index', compact('groups'));
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
                $query->orderBy('date', 'desc')->limit(7);
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
}
