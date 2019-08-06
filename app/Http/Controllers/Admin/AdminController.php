<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Http\Requests\Admin\adminUpdateRequest;
use App\Story;
use App\User;
use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Morilog\Jalali\CalendarUtils;

class AdminController extends Controller
{

    public function dashboard()
    {
        $last_year = Carbon::now()->subMonth(12);

        $users = User::where('created_at', '>', $last_year)->selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month')
            ->groupBy('year', 'month')
            ->get();

        if ($users->first() != null) {

            $i = 0;

            foreach ($users as $user) {

                $date = [$user->year, $user->month, 1];

                $month[$i] = CalendarUtils::strftime('y F', strtotime(join('-', $date)));

                $count[$i] = $user->count;

                $i++;

            }

            $chart = Charts::create('line', 'highcharts')
                ->elementLabel(' ')
                ->labels($month)
                ->values($count)
                ->responsive(true);

            return view('panel.admin.index', ['chart' => $chart]);
        }
    }

    public function profile()
    {
        $admins = Admin::all();

        return view('panel.admin.profile', compact('admins'));
    }

    public function update(adminUpdateRequest $request , $id)
    {
        $admin = Admin::where('id', $id)->first();

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'admin',
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $stories = Story::where('name', 'LIKE', '%' . $request->search . '%')->get();

        return view('panel.story.search' ,compact('stories'));

    }

}
