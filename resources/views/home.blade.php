@extends('layouts.app')

@section('content')


    <div class="">
        <img src="{{ asset('/img/bg.jpg') }}" class="max-h-sm-m w-full" />
    </div>

    <section class="bg-grey-lightest p-16">
        <div class="">
            <div class="text-center pb-8">
                <h3 class="text-2xl">ABOUT MERF</h3>
            </div>
            
            <p class="text-lg">
                Indian Council of Medical Research (ICMR) is an apex body in India for addressing the scientific advances in the field of biomedical research. Currently, ICMR comprises of 26 research institutes catering to different areas of health research. ICMR can push biomedical science forward by sharing access to state-of-the-art facilities and resources available at the institutes under ICMR.
                <br><br>
                <b>Medical Equipments Repository Facility (MERF) </b> is a platform to search, track and manage the medical equipment’s of the 26 institutes of ICMR which are operated and maintained by a dedicated and qualified group of Scientists and Engineers. The purpose of establishing this facility is to provide easy access to these equipment’s and their management to the scientific community for advanced research. It also facilitates operation of sophisticated equipment’s located in various regions and thus helps in providing the required training to the users at appropriate time. It also caters as a robust reporting system to maintain the stock and increasing the utilization of equipment’s by sharing them. It improves the traceability and gives the detailed information about the equipment present in any institute, through attributes like manufacturer and model number.
                <br><br>
                <b>MERF</b> has been established as a joint effort of the team <b><u>Bvptechies</u></b>, <b><u>Dr. Rajni Kant (Scientist ‘F’ and Head, ICMR)</u></b> & <b><u>Dr. Meenakshi Sharma (Scientist ‘F’, ICMR)</u></b>. It was initially pitched as a problem statement at Smart India Hackathon 2017 which was a Government of India first ever initiative to solve the real world problems faced by various ministries. This provides feasibility in long run to keep the central institute as well as government updated about every instrument and its status in the institute.
            </p>
        </div>
    </section>

    <section class="bg-white p-16">
        <div class="">
            <div class="text-center pb-8">
                <h3 class="text-2xl">OUR OBJECTIVES</h3>
            </div>
            
            <div class="section-content"><div class="objectives"><div class="objective"><div class="objective__content"><i class="ion-information-circled"></i><div class="objective__content-title">Centralized System</div><div class="objective__content-desc">Centralized interoperable system to maintain and track medical equipments to facilitate biomedical research</div></div></div><div class="objective"><div class="objective__content"><i class="ion-information-circled"></i><div class="objective__content-title">Enabling Research</div><div class="objective__content-desc">To provide facilities of sophisticated analytical instruments to scientists and other users from academic institutes, to carry out R&amp;D work.</div></div></div><div class="objective"><div class="objective__content"><i class="ion-information-circled"></i><div class="objective__content-title">Full Accountability</div><div class="objective__content-desc">Integrated platform that provides full accountability and traceability of facilities in an Institute.</div></div></div><div class="objective"><div class="objective__content"><i class="ion-information-circled"></i><div class="objective__content-title">Repository Management</div><div class="objective__content-desc">Effortless healthcare asset management, stock keeping and repository management.</div></div></div><div class="objective"><div class="objective__content"><i class="ion-information-circled"></i><div class="objective__content-title">Easy Access</div><div class="objective__content-desc">To provide scientists with a facility to use equipments not available within their laboratory for research.</div></div></div></div></div></div></section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
