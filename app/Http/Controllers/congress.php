<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contestant;
use App\Models\score;
use Illuminate\Support\Facades\Auth;
use App\Models\gmdcscore;
use App\Models\mgescore;
use App\Models\gcqbscore;
use App\Models\register;
use App\Models\User;


class congress extends Controller
{
    //Mr & Ms GIP 2023
    public function mmgclose(){
        $mmg = user::where('contest', 'mmg')->where('status', 'open')->get();
            if(auth::user()->role === 'admin'){
                foreach ($mmg as $close){
                    $close->status = 'close';
                    $close->save();}
            return redirect('/tally/mmg');}
            abort(403, 'Unauthorized action.');}

    public function mmgopen(){
        $mmg = user::where('contest', 'mmg')->where('status', 'close')->get();
            if(auth::user()->role === 'admin'){
                foreach ($mmg as $open){
                $open->status = 'open';
                $open->save();}
            return redirect('/tally/mmg');}
            abort(403, 'Unauthorized action.');}

    public function mmg(){
        $pnabnp = score::where('segment', 'pna')->where('criteria', 'bnp')->get();
        $pnasp = score::where('segment', 'pna')->where('criteria', 'sp')->get();
        $pnaoa = score::where('segment', 'pna')->where('criteria', 'oa')->get();
        $pnaai = score::where('segment', 'pna')->where('criteria', 'ai')->get();
        $bcabnp = score::where('segment', 'bca')->where('criteria', 'bnp')->get();
        $bcasp = score::where('segment', 'bca')->where('criteria', 'sp')->get();
        $bcaoa = score::where('segment', 'bca')->where('criteria', 'oa')->get();
        $bcaai = score::where('segment', 'bca')->where('criteria', 'ai')->get();
        $lgfabnp = score::where('segment', 'lgfa')->where('criteria', 'bnp')->get();
        $lgfasp = score::where('segment', 'lgfa')->where('criteria', 'sp')->get();
        $lgfaoa = score::where('segment', 'lgfa')->where('criteria', 'oa')->get();
        $lgfaai = score::where('segment', 'lgfa')->where('criteria', 'ai')->get();
        $qnadc = score::where('segment', 'qna')->where('criteria', 'dc')->get();
        $qnaca = score::where('segment', 'qna')->where('criteria', 'ca')->get();
        $qnaai = score::where('segment', 'qna')->where('criteria', 'ai')->get();


        foreach ($pnabnp->zip($pnasp, $pnaoa, $pnaai) as [$pnabnprecalc,$pnasprecalc, $pnaoarecalc, $pnaairecalc]){
            $pnabnprecalc->average = ($pnabnprecalc->judge1 + $pnabnprecalc->judge2 + $pnabnprecalc->judge3)/3;
            $pnabnprecalc->save();
            $pnasprecalc->average = ($pnasprecalc->judge1 + $pnasprecalc->judge2 + $pnasprecalc->judge3)/3;
            $pnasprecalc->save();
            $pnaoarecalc->average = ($pnaoarecalc->judge1 + $pnaoarecalc->judge2 + $pnaoarecalc->judge3)/3;
            $pnaoarecalc->save();
            $pnaairecalc->average = ($pnaairecalc->judge1 + $pnaairecalc->judge2 + $pnaairecalc->judge3)/3;
            $pnaairecalc->save();
            $total = contestant::where('id', $pnabnprecalc->contestant_id)->first();
            $total->totalpna = ($pnabnprecalc->average + $pnasprecalc->average + $pnaoarecalc->average + $pnaairecalc->average)*.2;
            $total->totalai = score::where('contestant_id', $pnabnprecalc->contestant_id)->where('criteria', 'ai')->sum('average')/4;
            $total->overall =  $total->totalpna + $total->totalbca + $total->totallgfa + $total->totalqna + $total->totalai;
            $total->save();
        }

        foreach ($bcabnp->zip($bcasp, $bcaoa, $bcaai) as [$bcabnprecalc,$bcasprecalc, $bcaoarecalc, $bcaairecalc]){
            $bcabnprecalc->average = ($bcabnprecalc->judge1 + $bcabnprecalc->judge2 + $bcabnprecalc->judge3)/3;
            $bcabnprecalc->save();
            $bcasprecalc->average = ($bcasprecalc->judge1 + $bcasprecalc->judge2 + $bcasprecalc->judge3)/3;
            $bcasprecalc->save();
            $bcaoarecalc->average = ($bcaoarecalc->judge1 + $bcaoarecalc->judge2 + $bcaoarecalc->judge3)/3;
            $bcaoarecalc->save();
            $bcaairecalc->average = ($bcaairecalc->judge1 + $bcaairecalc->judge2 + $bcaairecalc->judge3)/3;
            $bcaairecalc->save();
            $total = contestant::where('id', $bcabnprecalc->contestant_id)->first();
            $total->totalbca = ($bcabnprecalc->average + $bcasprecalc->average + $bcaoarecalc->average + $bcaairecalc->average)*.2;
            $total->totalai = score::where('contestant_id', $bcabnprecalc->contestant_id)->where('criteria', 'ai')->sum('average')/4;
            $total->overall =  $total->totalpna + $total->totalbca + $total->totallgfa + $total->totalqna + $total->totalai;
            $total->save();
        }

        foreach ($lgfabnp->zip($lgfasp, $lgfaoa, $lgfaai) as [$lgfabnprecalc,$lgfasprecalc, $lgfaoarecalc, $lgfaairecalc]){
            $lgfabnprecalc->average = ($lgfabnprecalc->judge1 + $lgfabnprecalc->judge2 + $lgfabnprecalc->judge3)/3;
            $lgfabnprecalc->save();
            $lgfasprecalc->average = ($lgfasprecalc->judge1 + $lgfasprecalc->judge2 + $lgfasprecalc->judge3)/3;
            $lgfasprecalc->save();
            $lgfaoarecalc->average = ($lgfaoarecalc->judge1 + $lgfaoarecalc->judge2 + $lgfaoarecalc->judge3)/3;
            $lgfaoarecalc->save();
            $lgfaairecalc->average = ($lgfaairecalc->judge1 + $lgfaairecalc->judge2 + $lgfaairecalc->judge3)/3;
            $lgfaairecalc->save();
            $total = contestant::where('id', $lgfabnprecalc->contestant_id)->first();
            $total->totallgfa = ($lgfabnprecalc->average + $lgfasprecalc->average + $lgfaoarecalc->average + $lgfaairecalc->average)*.2;
            $total->totalai = score::where('contestant_id', $lgfabnprecalc->contestant_id)->where('criteria', 'ai')->sum('average')/4;
            $total->overall =  $total->totalpna + $total->totalbca + $total->totallgfa + $total->totalqna + $total->totalai;
            $total->save();
        }

        foreach ($qnadc->zip($qnaca, $qnaai) as [$qnadcrecalc, $qnacarecalc, $qnaairecalc]){
            $qnadcrecalc->average = ($qnadcrecalc->judge1 + $qnadcrecalc->judge2 + $qnadcrecalc->judge3)/3;
            $qnadcrecalc->save();
            $qnacarecalc->average = ($qnacarecalc->judge1 + $qnacarecalc->judge2 + $qnacarecalc->judge3)/3;
            $qnacarecalc->save();
            $qnaairecalc->average = ($qnaairecalc->judge1 + $qnaairecalc->judge2 + $qnaairecalc->judge3)/3;
            $qnaairecalc->save();
            $total = contestant::where('id', $qnaairecalc->contestant_id)->first();
            $total->totalqna = ($qnadcrecalc->average + $qnacarecalc->average + $qnaairecalc->average)*.3;
            $total->totalai = score::where('contestant_id', $qnadcrecalc->contestant_id)->where('criteria', 'ai')->sum('average')/4;
            $total->overall =  $total->totalpna + $total->totalbca + $total->totallgfa + $total->totalqna + $total->totalai;
            $total->save();
        }





        $fcon = contestant::where('gender', 'F')->get();
        $mcon = contestant::where('gender', 'M')->get();
        $mranks = $this->mrank();
        $franks = $this->frank();
            return view('mmg', ['mcon' => $mcon, 'fcon' => $fcon, 'mranks' => $mranks,'franks' => $franks]);}

    public  function mmgtab(){
        $scoreA = score::where('segment','pna')->where('criteria', 'bnp')->get();
        $scoreB = score::where('segment','pna')->where('criteria', 'sp')->get();
        $scoreC = score::where('segment','pna')->where('criteria', 'oa')->get();
        $scoreD = score::where('segment','pna')->where('criteria', 'ai')->get();
        $scoreE = score::where('segment','bca')->where('criteria', 'bnp')->get();
        $scoreF = score::where('segment','bca')->where('criteria', 'sp')->get();
        $scoreG = score::where('segment','bca')->where('criteria', 'oa')->get();
        $scoreH = score::where('segment','bca')->where('criteria', 'ai')->get();
        $scoreI = score::where('segment','lgfa')->where('criteria', 'bnp')->get();
        $scoreJ = score::where('segment','lgfa')->where('criteria', 'sp')->get();
        $scoreK = score::where('segment','lgfa')->where('criteria', 'oa')->get();
        $scoreL = score::where('segment','lgfa')->where('criteria', 'ai')->get();
        $scoreM = score::where('segment','qna')->where('criteria', 'dc')->get();
        $scoreN = score::where('segment','qna')->where('criteria', 'ca')->get();
        $scoreO = score::where('segment','qna')->where('criteria', 'ai')->get();
        $contestant = contestant::where('contest', 'mmg')->where('name','!=','init')->get();
        $contestantB = contestant::where('contest', 'mmg')->where('name','!=','init')->get();
        $contestantC = contestant::where('contest', 'mmg')->where('name','!=','init')->get();
        $contestantD = contestant::where('contest', 'mmg')->where('name','!=','init')->get();
            return view('mmg-tab', [ 'contestant' => $contestant, 'contestantB' => $contestantB,'contestantC' => $contestantC, 'scoreA' => $scoreA, 'scoreB' => $scoreB,
            'contestantD' => $contestantD, 'scoreC' => $scoreC, 'scoreD' => $scoreD, 'scoreE' => $scoreE, 'scoreF' => $scoreF, 'scoreG' => $scoreG, 'scoreH' => $scoreH, 'scoreI' => $scoreI, 'scoreJ' => $scoreJ, 'scoreK' => $scoreK,
              'scoreL' => $scoreL, 'scoreM' => $scoreM, 'scoreN' => $scoreN, 'scoreO' => $scoreO]);}
        
    public  function mmgtabpna($id){
        $scoreA = score::find($id);
        $contestant = contestant::where('id', $scoreA->contestant_id)->first();
        $scoreB = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'pna')->where('criteria', 'sp')->first();
        $scoreC = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'pna')->where('criteria', 'oa')->first();
        $scoreD = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'pna')->where('criteria', 'ai')->first();
            return view('mmg-tab-pna', ['contestant'=> $contestant, 'scoreA' => $scoreA, 'scoreB' => $scoreB, 'scoreC' => $scoreC, 'scoreD' => $scoreD]);}

    public  function mmgtabbca($id){
        $scoreA = score::find($id);
        $contestant = contestant::where('id', $scoreA->contestant_id)->first();
        $scoreB = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'bca')->where('criteria', 'sp')->first();
        $scoreC = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'bca')->where('criteria', 'oa')->first();
        $scoreD = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'bca')->where('criteria', 'ai')->first();
            return view('mmg-tab-bca', ['contestant'=> $contestant, 'scoreA' => $scoreA, 'scoreB' => $scoreB, 'scoreC' => $scoreC, 'scoreD' => $scoreD]);}

    public  function mmgtablgfa($id){
        $scoreA = score::find($id);
        $contestant = contestant::where('id', $scoreA->contestant_id)->first();
        $scoreB = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'lgfa')->where('criteria', 'sp')->first();
        $scoreC = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'lgfa')->where('criteria', 'oa')->first();
        $scoreD = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'lgfa')->where('criteria', 'ai')->first();
            return view('mmg-tab-lgfa', ['contestant'=> $contestant, 'scoreA' => $scoreA, 'scoreB' => $scoreB, 'scoreC' => $scoreC, 'scoreD' => $scoreD]);}

    public  function mmgtabqna($id){
        $scoreA = score::find($id);
        $contestant = contestant::where('id', $scoreA->contestant_id)->first();
        $scoreB = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'qna')->where('criteria', 'ca')->first();
        $scoreC = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'qna')->where('criteria', 'ai')->first();
            return view('mmg-tab-qna', ['contestant'=> $contestant, 'scoreA' => $scoreA, 'scoreB' => $scoreB, 'scoreC' => $scoreC]);}


    public  function mmgtabpnasave(Request $request, $id){
        $scoreA = score::find($id);
        $scoreB = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'pna')->where('criteria', 'sp')->first();
        $scoreC = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'pna')->where('criteria', 'oa')->first();
        $scoreD = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'pna')->where('criteria', 'ai')->first();
        $total = contestant::where('id', $scoreA->contestant_id )->first();

        if (Auth::User()->role === 'admin'){
        $scoreA->judge1 = $request->bnpj1;
        $scoreA->judge2 = $request->bnpj2;
        $scoreA->judge3 = $request->bnpj3;
        $scoreA->average = ($request->bnpj1 + $request->bnpj2 + $request->bnpj3)/3;
        $scoreA->save();

        $scoreB->judge1 = $request->spj1;
        $scoreB->judge2 = $request->spj2;
        $scoreB->judge3 = $request->spj3;
        $scoreB->average = ($request->spj1 + $request->spj2 + $request->spj3)/3;
        $scoreB->save();

        $scoreC->judge1 = $request->oaj1;
        $scoreC->judge2 = $request->oaj2;
        $scoreC->judge3 = $request->oaj3;
        $scoreC->average = ($request->oaj1 + $request->oaj2 + $request->oaj3)/3;
        $scoreC->save();

        $scoreD->judge1 = $request->aij1;
        $scoreD->judge2 = $request->aij2;
        $scoreD->judge3 = $request->aij3;
        $scoreD->average = ($request->aij1 + $request->aij2 + $request->aij3)/3;
        $scoreD->save();

        $total->totalpna = ($scoreA->average + $scoreB->average + $scoreC->average + $scoreD->average)*.2;
        $total->totalai = score::where('contestant_id', $scoreA->contestant_id)->where('criteria', 'ai')->sum('average')/4;
        $total->overall =  $total->totalpna + $total->totalbca + $total->totallgfa + $total->totalqna + $total->totalai;
        $total->save();
            return redirect('tabulate/mmg');}
        elseif (Auth::User()->role === 'judge1'){
            $scoreA->judge1 = $request->bnpj1;
            $scoreA->save();
            $scoreB->judge1 = $request->spj1;
            $scoreB->save();
            $scoreC->judge1 = $request->oaj1;
            $scoreC->save();
            $scoreD->judge1 = $request->aij1;
            $scoreD->save();
            return redirect('tabulate/mmg');}
        elseif (Auth::User()->role === 'judge2'){
            $scoreA->judge2 = $request->bnpj2;
            $scoreA->save();
            $scoreB->judge2 = $request->spj2;
            $scoreB->save();
            $scoreC->judge2 = $request->oaj2;
            $scoreC->save();
            $scoreD->judge2 = $request->aij2;
            $scoreD->save();
            return redirect('tabulate/mmg');}
        elseif (Auth::User()->role === 'judge3'){
            $scoreA->judge3 = $request->bnpj3;
            $scoreA->save();
            $scoreB->judge3 = $request->spj3;
            $scoreB->save();
            $scoreC->judge3 = $request->oaj3;
            $scoreC->save();
            $scoreD->judge3 = $request->aij3;
            $scoreD->save();        
            return redirect('tabulate/mmg');}
        }

    public  function mmgtabbcasave(Request $request, $id){
        $scoreA = score::find($id);
        $scoreB = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'bca')->where('criteria', 'sp')->first();
        $scoreC = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'bca')->where('criteria', 'oa')->first();
        $scoreD = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'bca')->where('criteria', 'ai')->first();
        $total = contestant::where('id', $scoreA->contestant_id )->first();
    
        if (Auth::User()->role === 'admin'){
            $scoreA->judge1 = $request->bnpj1;
            $scoreA->judge2 = $request->bnpj2;
            $scoreA->judge3 = $request->bnpj3;
            $scoreA->average = ($request->bnpj1 + $request->bnpj2 + $request->bnpj3)/3;
            $scoreA->save();
    
            $scoreB->judge1 = $request->spj1;
            $scoreB->judge2 = $request->spj2;
            $scoreB->judge3 = $request->spj3;
            $scoreB->average = ($request->spj1 + $request->spj2 + $request->spj3)/3;
            $scoreB->save();
    
            $scoreC->judge1 = $request->oaj1;
            $scoreC->judge2 = $request->oaj2;
            $scoreC->judge3 = $request->oaj3;
            $scoreC->average = ($request->oaj1 + $request->oaj2 + $request->oaj3)/3;
            $scoreC->save();
    
            $scoreD->judge1 = $request->aij1;
            $scoreD->judge2 = $request->aij2;
            $scoreD->judge3 = $request->aij3;
            $scoreD->average = ($request->aij1 + $request->aij2 + $request->aij3)/3;
            $scoreD->save();
    
            $total->totalbca = ($scoreA->average + $scoreB->average + $scoreC->average + $scoreD->average)*.2;
            $total->totalai = score::where('contestant_id', $scoreA->contestant_id)->where('criteria', 'ai')->sum('average')/4;
            $total->overall =  $total->totalpna + $total->totalbca + $total->totallgfa + $total->totalqna + $total->totalai;
            $total->save();
                return redirect('tabulate/mmg');}
            elseif (Auth::User()->role === 'judge1'){
                $scoreA->judge1 = $request->bnpj1;
                $scoreA->save();
                $scoreB->judge1 = $request->spj1;
                $scoreB->save();
                $scoreC->judge1 = $request->oaj1;
                $scoreC->save();
                $scoreD->judge1 = $request->aij1;
                $scoreD->save();
                return redirect('tabulate/mmg');}
            elseif (Auth::User()->role === 'judge2'){
                $scoreA->judge2 = $request->bnpj2;
                $scoreA->save();
                $scoreB->judge2 = $request->spj2;
                $scoreB->save();
                $scoreC->judge2 = $request->oaj2;
                $scoreC->save();
                $scoreD->judge2 = $request->aij2;
                $scoreD->save();
                return redirect('tabulate/mmg');}
            elseif (Auth::User()->role === 'judge3'){
                $scoreA->judge3 = $request->bnpj3;
                $scoreA->save();
                $scoreB->judge3 = $request->spj3;
                $scoreB->save();
                $scoreC->judge3 = $request->oaj3;
                $scoreC->save();
                $scoreD->judge3 = $request->aij3;
                $scoreD->save();        
                return redirect('tabulate/mmg');}
    }

    public  function mmgtablgfasave(Request $request, $id){
        $scoreA = score::find($id);
        $scoreB = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'lgfa')->where('criteria', 'sp')->first();
        $scoreC = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'lgfa')->where('criteria', 'oa')->first();
        $scoreD = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'lgfa')->where('criteria', 'ai')->first();
        $total = contestant::where('id', $scoreA->contestant_id )->first();
    
        if (Auth::User()->role === 'admin'){
            $scoreA->judge1 = $request->bnpj1;
            $scoreA->judge2 = $request->bnpj2;
            $scoreA->judge3 = $request->bnpj3;
            $scoreA->average = ($request->bnpj1 + $request->bnpj2 + $request->bnpj3)/3;
            $scoreA->save();
    
            $scoreB->judge1 = $request->spj1;
            $scoreB->judge2 = $request->spj2;
            $scoreB->judge3 = $request->spj3;
            $scoreB->average = ($request->spj1 + $request->spj2 + $request->spj3)/3;
            $scoreB->save();
    
            $scoreC->judge1 = $request->oaj1;
            $scoreC->judge2 = $request->oaj2;
            $scoreC->judge3 = $request->oaj3;
            $scoreC->average = ($request->oaj1 + $request->oaj2 + $request->oaj3)/3;
            $scoreC->save();
    
            $scoreD->judge1 = $request->aij1;
            $scoreD->judge2 = $request->aij2;
            $scoreD->judge3 = $request->aij3;
            $scoreD->average = ($request->aij1 + $request->aij2 + $request->aij3)/3;
            $scoreD->save();
    
            $total->totallgfa = ($scoreA->average + $scoreB->average + $scoreC->average + $scoreD->average)*.2;
            $total->totalai = score::where('contestant_id', $scoreA->contestant_id)->where('criteria', 'ai')->sum('average')/4;
            $total->overall =  $total->totalpna + $total->totalbca + $total->totallgfa + $total->totalqna + $total->totalai;
            $total->save();
                return redirect('tabulate/mmg');}
            elseif (Auth::User()->role === 'judge1'){
                $scoreA->judge1 = $request->bnpj1;
                $scoreA->save();
                $scoreB->judge1 = $request->spj1;
                $scoreB->save();
                $scoreC->judge1 = $request->oaj1;
                $scoreC->save();
                $scoreD->judge1 = $request->aij1;
                $scoreD->save();
                return redirect('tabulate/mmg');}
            elseif (Auth::User()->role === 'judge2'){
                $scoreA->judge2 = $request->bnpj2;
                $scoreA->save();
                $scoreB->judge2 = $request->spj2;
                $scoreB->save();
                $scoreC->judge2 = $request->oaj2;
                $scoreC->save();
                $scoreD->judge2 = $request->aij2;
                $scoreD->save();
                return redirect('tabulate/mmg');}
            elseif (Auth::User()->role === 'judge3'){
                $scoreA->judge3 = $request->bnpj3;
                $scoreA->save();
                $scoreB->judge3 = $request->spj3;
                $scoreB->save();
                $scoreC->judge3 = $request->oaj3;
                $scoreC->save();
                $scoreD->judge3 = $request->aij3;
                $scoreD->save();        
                return redirect('tabulate/mmg');}
    }             

    public  function mmgtabqnasave(Request $request, $id){
        $scoreA = score::find($id);
        $scoreB = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'qna')->where('criteria', 'ca')->first();
        $scoreC = score::where('contestant_id', $scoreA->contestant_id)->where('segment', 'qna')->where('criteria', 'ai')->first();
        $total = contestant::where('id', $scoreA->contestant_id )->first();

        if (Auth::User()->role === 'admin'){
        $scoreA->judge1 = $request->dcj1;
        $scoreA->judge2 = $request->dcj2;
        $scoreA->judge3 = $request->dcj3;
        $scoreA->average = ($request->dcj1 + $request->dcj2 + $request->dcj3)/3;
        $scoreA->save();
    
        $scoreB->judge1 = $request->caj1;
        $scoreB->judge2 = $request->caj2;
        $scoreB->judge3 = $request->caj3;
        $scoreB->average = ($request->caj1 + $request->caj2 + $request->caj3)/3;
        $scoreB->save();
    
        $scoreC->judge1 = $request->aij1;
        $scoreC->judge2 = $request->aij2;
        $scoreC->judge3 = $request->aij3;
        $scoreC->average = ($request->aij1 + $request->aij2 + $request->aij3)/3;
        $scoreC->save();
    
        $total->totalqna = ($scoreA->average + $scoreB->average + $scoreC->average)*.3;
        $total->totalai = score::where('contestant_id', $scoreA->contestant_id)->where('criteria', 'ai')->sum('average')/4;
        $total->overall =  $total->totalpna + $total->totalbca + $total->totallgfa + $total->totalqna + $total->totalai;
        $total->save();
            return redirect('tabulate/mmg');}
        elseif (Auth::User()->role === 'judge1'){
            $scoreA->judge1 = $request->dcj1;
            $scoreA->save();
            $scoreB->judge1 = $request->caj1;
            $scoreB->save();
            $scoreC->judge1 = $request->aij1;
            $scoreC->save();
            return redirect('tabulate/mmg');}
        elseif (Auth::User()->role === 'judge2'){
            $scoreA->judge2 = $request->dcj2;
            $scoreA->save();
            $scoreB->judge2 = $request->caj2;
            $scoreB->save();
            $scoreC->judge2 = $request->aij2;
            $scoreC->save();
            return redirect('tabulate/mmg');}        
        elseif (Auth::User()->role === 'judge3'){
            $scoreA->judge3 = $request->dcj3;
            $scoreA->save();
            $scoreB->judge3 = $request->caj3;
            $scoreB->save();
            $scoreC->judge3 = $request->aij3;
            $scoreC->save();}
            return redirect('tabulate/mmg');}             

    //GIP Modern Dance Contest
    public function gmdcclose(){
        $gmdc = user::where('contest', 'gmdc')->where('status', 'open')->get();
            if(auth::user()->role === 'admin'){
                foreach ($gmdc as $close){
                    $close->status = 'close';
                    $close->save();}
            return redirect('/tally/gmdc');}
            abort(403, 'Unauthorized action.');}

    public function gmdcopen(){
        $gmdc = user::where('contest', 'gmdc')->where('status', 'close')->get();
            if(auth::user()->role === 'admin'){
                foreach ($gmdc as $open){
                    $open->status = 'open';
                    $open->save();}
            return redirect('/tally/gmdc');}
            abort(403, 'Unauthorized action.');}

    public function gmdc(){
        $recalc = gmdcscore::all();
            foreach ($recalc as $recalcu){
                $recalcu->acrj = ($recalcu->crj1+$recalcu->crj2+$recalcu->crj3)/3;
                $recalcu->amej = ($recalcu->mej1+$recalcu->mej2+$recalcu->mej3)/3;
                $recalcu->aevj = ($recalcu->evj1+$recalcu->evj2+$recalcu->evj3)/3;
                $recalcu->aaij = ($recalcu->aij1+$recalcu->aij2+$recalcu->aij3)/3;
                $recalcu->total= $recalcu->acrj + $recalcu->amej + $recalcu->aevj +$recalcu->aaij;
                $recalcu->save();}
        $gmdcscores = gmdcscore::all();
        $ranks = gmdcscore::select('id', 'total')//change to cn after arrangement
            ->get()
            ->map(function ($item, $key) {
            $item->original_position = $key + 1; // Adding 1 to start with position 1.
            return $item;
             });
    
            // Sort the data based on the "total" column in descending order.
            $sortedData = $ranks->sortByDesc('total');
    
            // Assign rankings to the sorted data.
            $ranking = 1;
            
            $previousRank = null;
            $previousTotal = null;
            $sortedData = $sortedData->map(function ($item) use (&$ranking, &$previousTotal, &$previousRank) {
                if ($previousTotal !== null && $item->total !== $previousTotal) {
                    $ranking++;
                }
                if ($previousTotal !== null && $item->total === $previousTotal) {
                    $ranking++;
                }
                $item->ranking = $previousRank !== null && $item->total === $previousTotal ? $previousRank : $ranking . $this->getRankSuffix($ranking);
                $previousTotal = $item->total;
                $previousRank = $item->ranking;
                return $item;});
    
            // Merge the sorted and ranked data with the original data.
            $mergedData = $ranks->map(function ($originalItem) use ($sortedData) {
                return $sortedData->first(function ($sortedItem) use ($originalItem) {
                    return $sortedItem->id === $originalItem->id;
                });
            });
            return view('gmdc', ['gmdcscores' => $gmdcscores, 'ranks' => $ranks]);}

    public function gmdctab(){
        $scores = gmdcscore::all(); //where('cn', '<>', '')->orderby('cn', 'asc')->get();
        $scoresud = gmdcscore::all();
            return view('gmdc-tab', ['scores' => $scores, 'scoresud' => $scoresud]);}

    public function gmdctabsave(Request $request, $id){
        $scores = gmdcscore::find($id);
            if (Auth::user()->role === 'admin'){
                $scores->crj1 = $request->crj1;
                $scores->crj2 = $request->crj2;
                $scores->crj3 = $request->crj3;
                $scores->acrj = ($request->crj1+$request->crj2+$request->crj3)/3;
                $scores->mej1 = $request->mej1;
                $scores->mej2 = $request->mej2;
                $scores->mej3 = $request->mej3;
                $scores->amej = ($request->mej1+$request->mej2+$request->mej3)/3;
                $scores->evj1 = $request->evj1;
                $scores->evj2 = $request->evj2;
                $scores->evj3 = $request->evj3;
                $scores->aevj = ($request->evj1+$request->evj2+$request->evj3)/3;
                $scores->aij1 = $request->aij1;
                $scores->aij2 = $request->aij2;
                $scores->aij3 = $request->aij3;
                $scores->aaij = ($request->aij1+$request->aij2+$request->aij3)/3;
                $scores->total= $scores->acrj + $scores->amej + $scores->aevj +$scores->aaij;
                $scores->save();
                return redirect('/tabulate/gmdc');}
            elseif (Auth::user()->role === 'judge1'){
                $scores->crj1 = $request->crj1;
                $scores->mej1 = $request->mej1;
                $scores->evj1 = $request->evj1;
                $scores->aij1 = $request->aij1;
                $scores->save();
                return redirect('/tabulate/gmdc');}
            elseif (Auth::user()->role === 'judge2'){
                $scores->crj2 = $request->crj2;
                $scores->mej2 = $request->mej2;
                $scores->evj2 = $request->evj2;
                $scores->aij2 = $request->aij2;
                $scores->save();
                return redirect('/tabulate/gmdc');}
            elseif (Auth::user()->role === 'judge3'){
                $scores->crj3 = $request->crj3;
                $scores->mej3 = $request->mej3;
                $scores->evj3 = $request->evj3;
                $scores->aij3 = $request->aij3;
                $scores->save();
                return redirect('/tabulate/gmdc');}} 

    //My GIP Experience
    public function mgeclose(){
        $mge = user::where('contest', 'mge')->where('status', 'open')->get();
            if(auth::user()->role === 'admin'){
                foreach ($mge as $close){
                    $close->status = 'close';
                    $close->save();}
            return redirect('/tally/mge');}
            abort(403, 'Unauthorized action.');}

    public function mgeopen(){
        $mge = user::where('contest', 'mge')->where('status', 'close')->get();
            if(auth::user()->role === 'admin'){
                foreach ($mge as $open){
                    $open->status = 'open';
                    $open->save();}
            return redirect('/tally/mge');}
            abort(403, 'Unauthorized action.');}

    public function mge(){
        $recalc = mgescore::all();
            foreach ($recalc as $recalcu){
                $recalcu->acrj = ($recalcu->crj1+$recalcu->crj2+$recalcu->crj3)/3;
                $recalcu->acarj = ($recalcu->carj1+$recalcu->carj2+$recalcu->carj3)/3;
                $recalcu->total= $recalcu->acarj + $recalcu->acrj;
                $recalcu->save();}
        $mgescores = mgescore::all();
        $ranks = mgescore::select('id', 'total')//change to cn after arrangement
            ->get()
            ->map(function ($item, $key) {
            $item->original_position = $key + 1; // Adding 1 to start with position 1.
            return $item;
             });
    
            // Sort the data based on the "total" column in descending order.
            $sortedData = $ranks->sortByDesc('total');
    
            // Assign rankings to the sorted data.
            $ranking = 1;
            
            $previousRank = null;
            $previousTotal = null;
            $sortedData = $sortedData->map(function ($item) use (&$ranking, &$previousTotal, &$previousRank) {
                if ($previousTotal !== null && $item->total !== $previousTotal) {
                    $ranking++;
                }
                if ($previousTotal !== null && $item->total === $previousTotal) {
                    $ranking++;
                }
                $item->ranking = $previousRank !== null && $item->total === $previousTotal ? $previousRank : $ranking . $this->getRankSuffix($ranking);
                $previousTotal = $item->total;
                $previousRank = $item->ranking;
                return $item;});
    
            // Merge the sorted and ranked data with the original data.
            $mergedData = $ranks->map(function ($originalItem) use ($sortedData) {
                return $sortedData->first(function ($sortedItem) use ($originalItem) {
                    return $sortedItem->id === $originalItem->id;});});
            return view('mge', ['mgescores' => $mgescores, 'ranks' => $ranks]);}

    public function mgetab(){
        $scores = mgescore::all(); //where('cn', '<>', '')->orderby('cn', 'asc')->get();
        $scoresud = mgescore::all();
            return view('mge-tab', ['scores' => $scores, 'scoresud' => $scoresud]);}

    public function mgetabsave(Request $request, $id){
        $scores = mgescore::find($id);
            if (Auth::user()->role === 'admin'){
                $scores->carj1 = $request->carj1;
                $scores->carj2 = $request->carj2;
                $scores->carj3 = $request->carj3;
                $scores->acarj = ($request->carj1+$request->carj2+$request->carj3)/3;
                $scores->crj1 = $request->crj1;
                $scores->crj2 = $request->crj2;
                $scores->crj3 = $request->crj3;
                $scores->acrj = ($request->crj1+$request->crj2+$request->crj3)/3;
                $scores->total= $scores->acarj + $scores->acrj;
                $scores->save();
                return redirect('/tabulate/mge');}
            elseif (Auth::user()->role === 'judge1'){
                $scores->carj1 = $request->carj1;
                $scores->crj1 = $request->crj1;
                $scores->save();
                $scores->save();
                return redirect('/tabulate/mge');}
            elseif (Auth::user()->role === 'judge2'){
                $scores->carj2 = $request->carj2;
                $scores->crj2 = $request->crj2;
                $scores->save();
                $scores->save();
                return redirect('/tabulate/mge');}
            elseif (Auth::user()->role === 'judge1'){
                $scores->carj3 = $request->carj3;
                $scores->crj3 = $request->crj3;
                $scores->save();
                $scores->save();
                return redirect('/tabulate/mge');}}    
        
    //GIP Congress Quiz Bee
    public function gcqbclose(){
        $gcqb = user::where('contest', 'gcqb')->where('status', 'open')->get();
            if(auth::user()->role === 'admin'){
                foreach ($gcqb as $close){
                    $close->status = 'close';
                    $close->save();}
            return redirect('/tally/gcqb');}
            abort(403, 'Unauthorized action.');}

    public function gcqbopen(){
        $gcqb = user::where('contest', 'gcqb')->where('status', 'close')->get();
            if(auth::user()->role === 'admin'){
                foreach ($gcqb as $open){
                    $open->status = 'open';
                    $open->save();}
            return redirect('/tally/gcqb');}
            abort(403, 'Unauthorized action.');}

    public function gcqb(){
        $gcqbscores = gcqbscore::all();
        $gcqbtop3 = gcqbscore::orderBy('r1r2', 'desc')->limit(3)->get();
        $ranks = gcqbscore::select('id', 'r1r2')//change to cn after arrangement
            ->get()
            ->map(function ($item, $key) {
            $item->original_position = $key + 1; // Adding 1 to start with position 1.
            return $item;});

            // Sort the data based on the "total" column in descending order.
            $sortedData = $ranks->sortByDesc('r1r2');
            
            // Assign rankings to the sorted data.
            $ranking = 1;
            
            $previousRank = null;
            $previousTotal = null;
            $sortedData = $sortedData->map(function ($item) use (&$ranking, &$previousTotal, &$previousRank) {
                if ($previousTotal !== null && $item->r1r2 !== $previousTotal) {
                    $ranking++;
                }
                if ($previousTotal !== null && $item->r1r2 === $previousTotal) {
                    $ranking++;
                }
                $item->ranking = $previousRank !== null && $item->r1r2 === $previousTotal ? $previousRank : $ranking . $this->getRankSuffix($ranking);
                $previousTotal = $item->r1r2;
                $previousRank = $item->ranking;
                return $item;});

            // Merge the sorted and ranked data with the original data.
            $mergedData = $ranks->map(function ($originalItem) use ($sortedData) {
                return $sortedData->first(function ($sortedItem) use ($originalItem) {
                    return $sortedItem->id === $originalItem->id;});});

        $topranks = $this->gcqbtoprank();
            return view('gcqb', compact('gcqbscores', 'gcqbtop3', 'ranks', 'topranks'));}

    public function gcqbtab(){
        $scores = gcqbscore::all(); //where('cn', '<>', '')->orderby('cn', 'asc')->get();
        $scoresud = gcqbscore::all();
            return view('gcqb-tab', ['scores' => $scores, 'scoresud' => $scoresud]);}

    public function gcqbtabsave(Request $request, $id){
        $scores = gcqbscore::find($id);
        $scores->round1 = $request->round1;
        $scores->round2 = $request->round2;
        $scores->round3 = $request->round3;
        $scores->r1r2 = $request->round1+(($request->round2)*2);
        $scores->total = $scores->r1r2+(($request->round3)*3);
        $scores->save();
            return redirect('/tabulate/gcqb');}               

    public function registercan(Request $request){//done
        $newcontestant = new contestant;
        $newcontestant->name = $request->name;
        $newcontestant->office = $request->office;
        $newcontestant->gender = $request->gender;
        $newcontestant->contest = $request->contest;
        if ($request->contest === 'mmg'){
            if ($request->office === 'DNFO'){
                $newcontestant->npo = 'CONTENDER F';}
            else if ($request->office === 'DSFO'){
                $newcontestant->npo = 'CONTENDER B';}
            else if ($request->office === 'DOCFO'){
                $newcontestant->npo = 'CONTENDER E';}
            else if ($request->office === 'DORFO'){
                $newcontestant->npo = 'CONTENDER D';}
            else if ($request->office === 'DOFO'){
                $newcontestant->npo = 'CONTENDER A';}
            else if ($request->office === 'DCFO'){
                $newcontestant->npo = 'CONTENDER C';}}
        $newcontestant->save();

            if ($request->contest === 'mmg'){{
                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'bnp';
                $newscore->segment = 'pna';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'sp';
                $newscore->segment = 'pna';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'oa';
                $newscore->segment = 'pna';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'ai';
                $newscore->segment = 'pna';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'bnp';
                $newscore->segment = 'bca';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'sp';
                $newscore->segment = 'bca';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'oa';
                $newscore->segment = 'bca';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'ai';
                $newscore->segment = 'bca';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'bnp';
                $newscore->segment = 'lgfa';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'sp';
                $newscore->segment = 'lgfa';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'oa';
                $newscore->segment = 'lgfa';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'ai';
                $newscore->segment = 'lgfa';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'dc';
                $newscore->segment = 'qna';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'ca';
                $newscore->segment = 'qna';
                $newscore->save();

                $newscore = new score;
                $newscore->office =  $request->office;
                $newscore->gender = $request->gender;
                $newscore->contestant_id = $newcontestant->id;
                $newscore->criteria = 'ai';
                $newscore->segment = 'qna';
                $newscore->save();
            return redirect('/contestants');}}
            return redirect('/contestants');}
    
    public function contestants(){//done
        $mmg = contestant::where('contest', 'mmg')->where('name','!=','init')->get();
        $gmdc = contestant::where('contest', 'gmdc')->where('name','!=','init')->get();
        $gcqb = contestant::where('contest', 'gcqb')->where('name','!=','init')->get();
        $mge = contestant::where('contest', 'mge')->where('name','!=','init')->get();
            return view('contestants',['mmg' => $mmg, 'gmdc' => $gmdc , 'gcqb' => $gcqb, 'mge' => $mge]);}
    
    public function contestantsup(Request $request, $id){//done
        if ($request->contest === 'mmg'){
        $update = contestant::where('contest', 'mmg')->find($id);}
        elseif ($request->contest === 'gmdc'){ 
        $update = contestant::where('contest', 'gmdc')->find($id);}
        elseif ($request->contest === 'gcqb'){
        $update = contestant::where('contest', 'gcqb')->find($id);}
        elseif ($request->contest === 'mge'){
        $update = contestant::where('contest', 'mge')->find($id);}
        return view('update',['update' => $update]);}        

    public function save(Request $request, $id)
        { if ($request->contest === 'mmg'){
            $save = contestant::where('contest', 'mmg')->find($id);
            $save->name = $request->name;
            $save->gender = $request->gender;
            $save->office = $request->office;
            $save->save();}
            elseif ($request->contest === 'gmdc'){ 
            $save = contestant::where('contest', 'gmdc')->find($id);
            $save->name = $request->name;
            $save->gender = $request->gender;
            $save->office = $request->office;
            $save->save();}
            elseif ($request->contest === 'gcqb'){
            $save = contestant::where('contest', 'gcqb')->find($id);
            $save->name = $request->name;
            $save->gender = $request->gender;
            $save->office = $request->office;
            $save->save();}
            elseif ($request->contest === 'mge'){
            $save = contestant::where('contest', 'mge')->find($id);
            $save->name = $request->name;
            $save->gender = $request->gender;
            $save->office = $request->office;
            $save->save();}

        return redirect('/contestants');
        }

     public function delete(Request $request, $id){
        if ($request->contest === 'mmg'){
            $delete = contestant::where('contest', 'mmg')->find($id);
            $deletesc = score::where('contestant_id', $id)->get();
            $delete->delete();
            foreach ($deletesc as $deletesc){
            $deletesc->delete();}}
            elseif ($request->contest === 'gmdc'){ 
            $delete = contestant::where('contest', 'gmdc')->find($id);
            $deletesc = score::where('contestant_id', $id)->get();
            $delete->delete();
            foreach ($deletesc as $deletesc){
            $deletesc->delete();}}
            elseif ($request->contest === 'gcqb'){
            $delete = contestant::where('contest', 'gcqb')->find($id);
            $deletesc = score::where('contestant_id', $id)->get();
            $delete->delete();
            foreach ($deletesc as $deletesc){
            $deletesc->delete();}}
            elseif ($request->contest === 'mge'){
            $delete = contestant::where('contest', 'mge')->find($id);
            $deletesc = score::where('contestant_id', $id)->get();
            $delete->delete();
            foreach ($deletesc as $deletesc){
            $deletesc->delete();}}
            return redirect('/contestants');
}

    public function dashboard(){//done
        $user = Auth::user()->get();
        $mmmg = contestant::where('contest', 'mmg')->where('name','!=','init')->where('gender','M')->orderby('npo', 'asc')->get();
        $mranks = $this->dmrank();
        $franks = $this->dfrank();
        $fmmg = contestant::where('contest', 'mmg')->where('name','!=','init')->where('gender','F')->orderby('npo', 'asc')->get();
        $mge = mgescore::orderby('npo', 'asc')->get();
        $mgerank = $this->mgerank();
        $gcqb = gcqbscore::orderby('npo', 'asc')->get();
        $gcqbrank = $this->gcqbrank();
        $gmdc = gmdcscore::orderby('npo', 'asc')->get();
        $ranks = gmdcscore::select('npo','id', 'total')->orderby('npo', 'asc')//change to cn after arrangement
            ->get()
            ->map(function ($item, $key) {
            $item->original_position = $key + 1; // Adding 1 to start with position 1.
            return $item;
            });

            // Sort the data based on the "total" column in descending order.
            $sortedData = $ranks->sortByDesc('total');

            // Assign rankings to the sorted data.
            $ranking = 1;

            $previousRank = null;
            $previousTotal = null;
            $sortedData = $sortedData->map(function ($item) use (&$ranking, &$previousTotal, &$previousRank) {
                if ($previousTotal !== null && $item->total !== $previousTotal) {
                    $ranking++;
                }
                if ($previousTotal !== null && $item->total === $previousTotal) {
                    $ranking++;
                }
                $item->ranking = $previousRank !== null && $item->total === $previousTotal ? $previousRank : $ranking . $this->getRankSuffix($ranking);
                $previousTotal = $item->total;
                $previousRank = $item->ranking;
                return $item;});
        
            // Merge the sorted and ranked data with the original data.
            $mergedData = $ranks->map(function ($originalItem) use ($sortedData) {
                return $sortedData->first(function ($sortedItem) use ($originalItem) {
                    return $sortedItem->id === $originalItem->id;});});
            return view('dashboard',['user'=>$user,'mmmg' => $mmmg,'mranks'=>$mranks,'franks'=>$franks,'fmmg' => $fmmg, 'gmdc' => $gmdc , 
            'ranks' => $ranks, 'gcqb' => $gcqb, 'mge' => $mge, 'mgerank' => $mgerank, 'gcqbrank' => $gcqbrank]);}

    //Ranking Helper
    function getRankSuffix($ranking) {
        if ($ranking % 10 == 1 && $ranking != 11) {
            return 'st';
        } elseif ($ranking % 10 == 2 && $ranking != 12) {
            return 'nd';
        } elseif ($ranking % 10 == 3 && $ranking != 13) {
            return 'rd';
        } else {
            return 'th';}}

    public function gcqbtoprank(){
        $ranks = gcqbscore::select('id', 'total')->orderBy('r1r2', 'desc')->limit(3)->orderBy('total', 'desc')//change to cn after arrangement
            ->get()
            ->map(function ($item, $key) {
            $item->original_position = $key + 1; // Adding 1 to start with position 1.
            return $item;
            });

            // Sort the data based on the "total" column in descending order.
            $sortedData = $ranks->sortByDesc('total');
            
            // Assign rankings to the sorted data.
            $ranking = 1;
            
            $previousTotal = null;
            $sortedData = $sortedData->map(function ($item) use (&$ranking, &$previousTotal, &$previousRank) {
                if ($previousTotal !== null && $item->total !== $previousTotal) {
                    $ranking++;
                }
                if ($previousTotal !== null && $item->total === $previousTotal) {
                    $ranking++;
                }
                $item->ranking = $previousRank !== null && $item->total === $previousTotal ? $previousRank : $ranking . $this->getRankSuffix($ranking);
                $previousTotal = $item->total;
                $previousRank = $item->ranking;
                return $item;});

            // Merge the sorted and ranked data with the original data.
            $mergedData = $ranks->map(function ($originalItem) use ($sortedData) {
                return $sortedData->first(function ($sortedItem) use ($originalItem) {
                    return $sortedItem->id === $originalItem->id;});});
            return $mergedData;}

    public function mgerank(){
        $ranks = mgescore::select('id', 'total', 'npo')->orderBy('npo', 'asc')//change to cn after arrangement
            ->get()
            ->map(function ($item, $key) {
            $item->original_position = $key + 1; // Adding 1 to start with position 1.
            return $item;
            });

            // Sort the data based on the "total" column in descending order.
            $sortedData = $ranks->sortByDesc('total');
            
            // Assign rankings to the sorted data.
            $ranking = 1;

            $previousRank = null;
            $previousTotal = null;
            $sortedData = $sortedData->map(function ($item) use (&$ranking, &$previousTotal, &$previousRank) {
                if ($previousTotal !== null && $item->total !== $previousTotal) {
                    $ranking++;
                }
                if ($previousTotal !== null && $item->total === $previousTotal) {
                    $ranking++;
                }
                $item->ranking = $previousRank !== null && $item->total === $previousTotal ? $previousRank : $ranking . $this->getRankSuffix($ranking);
                $previousTotal = $item->total;
                $previousRank = $item->ranking;
                return $item;});

            // Merge the sorted and ranked data with the original data.
            $mergedData = $ranks->map(function ($originalItem) use ($sortedData) {
                return $sortedData->first(function ($sortedItem) use ($originalItem) {
                    return $sortedItem->id === $originalItem->id;});});
            return $mergedData;}

    public function gcqbrank(){
        $ranks = gcqbscore::select('id', 'total', 'npo')->orderBy('npo', 'asc')//change to cn after arrangement
            ->get()
            ->map(function ($item, $key) {
            $item->original_position = $key + 1; // Adding 1 to start with position 1.
            return $item;
            });

            // Sort the data based on the "total" column in descending order.
            $sortedData = $ranks->sortByDesc('total');
            
            // Assign rankings to the sorted data.
            $ranking = 1;

            $previousRank = null;
                $previousTotal = null;
                $sortedData = $sortedData->map(function ($item) use (&$ranking, &$previousTotal, &$previousRank) {
                    if ($previousTotal !== null && $item->total !== $previousTotal) {
                        $ranking++;
                    }
                    if ($previousTotal !== null && $item->total === $previousTotal) {
                        $ranking++;
                    }
                    $item->ranking = $previousRank !== null && $item->total === $previousTotal ? $previousRank : $ranking . $this->getRankSuffix($ranking);
                    $previousTotal = $item->total;
                    $previousRank = $item->ranking;
                    return $item;});

            // Merge the sorted and ranked data with the original data.
            $mergedData = $ranks->map(function ($originalItem) use ($sortedData) {
                return $sortedData->first(function ($sortedItem) use ($originalItem) {
                    return $sortedItem->id === $originalItem->id;});});
            return $mergedData;}

    public function mrank(){
        $mrank = contestant::where('gender', 'M')->select('id', 'overall')//change to cn after arrangement
            ->get()
            ->map(function ($item, $key) {
            $item->original_position = $key + 1; // Adding 1 to start with position 1.
            return $item;
            });

            // Sort the data based on the "total" column in descending order.
            $sortedData = $mrank->sortByDesc('overall');

            // Assign rankings to the sorted data.
            $ranking = 1;
            
            $previousRank = null;
            $previousTotal = null;
            $sortedData = $sortedData->map(function ($item) use (&$ranking, &$previousTotal, &$previousRank) {
                if ($previousTotal !== null && $item->overall !== $previousTotal) {
                    $ranking++;
                }
                if ($previousTotal !== null && $item->overall === $previousTotal) {
                    $ranking++;
                }
                $item->ranking = $previousRank !== null && $item->overall === $previousTotal ? $previousRank : $ranking . $this->getRankSuffix($ranking);
                $previousTotal = $item->overall;
                $previousRank = $item->ranking;
                return $item;});

            // Merge the sorted and ranked data with the original data.
            $mergedData = $mrank->map(function ($originalItem) use ($sortedData) {
                return $sortedData->first(function ($sortedItem) use ($originalItem) {
                    return $sortedItem->id === $originalItem->id;});});
            return $mergedData;}

    public function frank(){
        $franks = contestant::where('gender', 'F')->select('id', 'overall')//change to cn after arrangement
            ->get()
            ->map(function ($item, $key) {
            $item->original_position = $key + 1; // Adding 1 to start with position 1.
            return $item;
            });

            // Sort the data based on the "total" column in descending order.
            $sortedData = $franks->sortByDesc('overall');

            // Assign rankings to the sorted data.
            $ranking = 1;
            
            $previousRank = null;
            $previousTotal = null;
            $sortedData = $sortedData->map(function ($item) use (&$ranking, &$previousTotal, &$previousRank) {
                if ($previousTotal !== null && $item->overall !== $previousTotal) {
                    $ranking++;
                }
                if ($previousTotal !== null && $item->overall === $previousTotal) {
                    $ranking++;
                }
                $item->ranking = $previousRank !== null && $item->overall === $previousTotal ? $previousRank : $ranking . $this->getRankSuffix($ranking);
                $previousTotal = $item->overall;
                $previousRank = $item->ranking;
                return $item;});

            // Merge the sorted and ranked data with the original data.
            $mergedData = $franks->map(function ($originalItem) use ($sortedData) {
                return $sortedData->first(function ($sortedItem) use ($originalItem) {
                    return $sortedItem->id === $originalItem->id;});});
            return $mergedData;}

    public function welcome(){//done
        $mmmg = contestant::where('contest', 'mmg')->where('name','!=','init')->where('gender','M')->get();
        $mranks = $this->mrank();
        $franks = $this->frank();
        $fmmg = contestant::where('contest', 'mmg')->where('name','!=','init')->where('gender','F')->get();
        $mge = mgescore::orderby('npo', 'asc')->get();
        $mgerank = $this->mgerank();
        $gcqb = gcqbscore::orderby('npo', 'asc')->get();
        $gcqbrank = $this->gcqbrank();
        $gmdc = gmdcscore::orderby('npo', 'asc')->get();
        $ranks = gmdcscore::select('npo','id', 'total')->orderby('npo', 'asc')//change to cn after arrangement
            ->get()
            ->map(function ($item, $key) {
            $item->original_position = $key + 1; // Adding 1 to start with position 1.
            return $item;
            });

            // Sort the data based on the "total" column in descending order.
            $sortedData = $ranks->sortByDesc('total');

            // Assign rankings to the sorted data.
            $ranking = 1;

            $previousRank = null;
            $previousTotal = null;
            $sortedData = $sortedData->map(function ($item) use (&$ranking, &$previousTotal, &$previousRank) {
                if ($previousTotal !== null && $item->total !== $previousTotal) {
                    $ranking++;
                }
                if ($previousTotal !== null && $item->total === $previousTotal) {
                    $ranking++;
                }
                $item->ranking = $previousRank !== null && $item->total === $previousTotal ? $previousRank : $ranking . $this->getRankSuffix($ranking);
                $previousTotal = $item->total;
                $previousRank = $item->ranking;
                return $item;
                });
                
            // Merge the sorted and ranked data with the original data.
            $mergedData = $ranks->map(function ($originalItem) use ($sortedData) {
                return $sortedData->first(function ($sortedItem) use ($originalItem) {
                    return $sortedItem->id === $originalItem->id;});});
            return view('welcome',['mmmg' => $mmmg,'mranks'=>$mranks,'franks'=>$franks,'fmmg' => $fmmg, 'gmdc' => $gmdc , 'ranks' => $ranks, 
            'gcqb' => $gcqb, 'mge' => $mge, 'mgerank' => $mgerank, 'gcqbrank' => $gcqbrank]);}

    public function dmrank(){
        $mrank = contestant::where('gender', 'M')->select('id', 'overall', 'npo')->orderBy('npo', 'asc')//change to cn after arrangement
            ->get()
            ->map(function ($item, $key) {
            $item->original_position = $key + 1; // Adding 1 to start with position 1.
            return $item;
            });

            // Sort the data based on the "total" column in descending order.
            $sortedData = $mrank->sortByDesc('overall');

            // Assign rankings to the sorted data.
            $ranking = 1;
            
            $previousRank = null;
            $previousTotal = null;
            $sortedData = $sortedData->map(function ($item) use (&$ranking, &$previousTotal, &$previousRank) {
                if ($previousTotal !== null && $item->overall !== $previousTotal) {
                    $ranking++;
                }
                if ($previousTotal !== null && $item->overall === $previousTotal) {
                    $ranking++;
                }
                $item->ranking = $previousRank !== null && $item->overall === $previousTotal ? $previousRank : $ranking . $this->getRankSuffix($ranking);
                $previousTotal = $item->overall;
                $previousRank = $item->ranking;
                return $item;});

            // Merge the sorted and ranked data with the original data.
            $mergedData = $mrank->map(function ($originalItem) use ($sortedData) {
                return $sortedData->first(function ($sortedItem) use ($originalItem) {
                    return $sortedItem->id === $originalItem->id;});});
            return $mergedData;}

    public function dfrank(){
        $franks = contestant::where('gender', 'F')->select('id', 'overall','npo')->orderBy('npo', 'asc')//change to cn after arrangement
            ->get()
            ->map(function ($item, $key) {
            $item->original_position = $key + 1; // Adding 1 to start with position 1.
            return $item;
            });

            // Sort the data based on the "total" column in descending order.
            $sortedData = $franks->sortByDesc('overall');

            // Assign rankings to the sorted data.
            $ranking = 1;
            
            $previousRank = null;
            $previousTotal = null;
            $sortedData = $sortedData->map(function ($item) use (&$ranking, &$previousTotal, &$previousRank) {
                if ($previousTotal !== null && $item->overall !== $previousTotal) {
                    $ranking++;
                }
                if ($previousTotal !== null && $item->overall === $previousTotal) {
                    $ranking++;
                }
                $item->ranking = $previousRank !== null && $item->overall === $previousTotal ? $previousRank : $ranking . $this->getRankSuffix($ranking);
                $previousTotal = $item->overall;
                $previousRank = $item->ranking;
                return $item;});

            // Merge the sorted and ranked data with the original data.
            $mergedData = $franks->map(function ($originalItem) use ($sortedData) {
                return $sortedData->first(function ($sortedItem) use ($originalItem) {
                    return $sortedItem->id === $originalItem->id;});});
            return $mergedData;}

}