<template>
    <!-- Admin sidebar -->
    <div v-if="$page.props.auth.user.admin" class="h-[calc(100vh-10rem)] md:h-[calc(100vh-12rem)] sticky top-40 flex flex-col items-center md:items-start border-r py-8 pr-6 pl-2 md:pr-10 md:pl-4 md:min-w-max">
        <Link href="/admin/rewards" class="text-xl pb-12 inline-flex items-center group" :class="{'text-yellow': $page.component.startsWith('Admin/Rewards') }">
          <svg class="fill-white group-hover:fill-yellow md:mr-3 min-w-max" :class="{'fill-yellow': $page.component.startsWith('Admin/Rewards') }" xmlns="http://www.w3.org/2000/svg" width="19.5" height="17.063" viewBox="0 0 19.5 17.063">
            <title>Gift icon</title>
            <path id="Icon_awesome-gift" data-name="Icon awesome-gift" d="M1.219,18.094a1.217,1.217,0,0,0,1.219,1.219H8.531V13.219H1.219Zm9.75,1.219h6.094a1.217,1.217,0,0,0,1.219-1.219V13.219H10.969ZM18.281,7.125h-1.6A3.321,3.321,0,0,0,17.062,5.6,3.357,3.357,0,0,0,13.711,2.25c-1.584,0-2.609.811-3.923,2.6-1.314-1.79-2.338-2.6-3.923-2.6A3.357,3.357,0,0,0,2.514,5.6,3.274,3.274,0,0,0,2.9,7.125H1.219A1.217,1.217,0,0,0,0,8.344v3.047A.611.611,0,0,0,.609,12H18.891a.611.611,0,0,0,.609-.609V8.344A1.217,1.217,0,0,0,18.281,7.125Zm-12.42,0a1.523,1.523,0,0,1,0-3.047c.758,0,1.318.126,3.279,3.047H5.861Zm7.85,0H10.432c1.958-2.914,2.5-3.047,3.279-3.047a1.523,1.523,0,0,1,0,3.047Z" transform="translate(0 -2.25)"/>
          </svg>
          <p class="group-hover:text-yellow hidden md:block">Rewards</p>
        </Link>
        <Link href="/admin/credits" class="text-xl pb-12 inline-flex items-center group" :class="{'text-yellow': $page.component.startsWith('Admin/Credits') }">
          <svg class="fill-white group-hover:fill-yellow md:mr-3 min-w-max" :class="{'fill-yellow': $page.component.startsWith('Admin/Credits') }" xmlns="http://www.w3.org/2000/svg" width="9.655" height="17.063" viewBox="0 0 9.655 17.063">
            <title>Money icon</title>
            <path id="Icon_metro-money" data-name="Icon metro-money" d="M15.887,13.915c-2.152-.559-2.844-1.133-2.844-2.033,0-1.033.953-1.758,2.559-1.758,1.687,0,2.313.806,2.37,1.991h2.095A3.774,3.774,0,0,0,17.025,8.5V6.427H14.181V8.474c-1.839.4-3.318,1.588-3.318,3.422,0,2.19,1.815,3.28,4.455,3.915,2.375.569,2.844,1.4,2.844,2.289,0,.649-.46,1.692-2.559,1.692-1.953,0-2.725-.877-2.825-1.991h-2.09a3.98,3.98,0,0,0,3.493,3.631v2.057h2.844V21.451c1.844-.355,3.318-1.422,3.318-3.37,0-2.683-2.3-3.6-4.455-4.166Z" transform="translate(-10.688 -6.427)"/>
          </svg>
          <p class="group-hover:text-yellow hidden md:block">Credits</p>
        </Link>
        <Link href="/admin/redeemed" class="text-xl pb-12 inline-flex items-center group " :class="{'text-yellow': $page.component.startsWith('Redeemed') }">
          <svg class="fill-white group-hover:fill-yellow md:mr-3 min-w-max" :class="{'fill-yellow': $page.component.startsWith('Redeemed') }" xmlns="http://www.w3.org/2000/svg" width="17.94" height="14.576" viewBox="0 0 17.94 14.576">
            <title>List icon</title>
            <path id="Icon_awesome-list-ul" data-name="Icon awesome-list-ul" d="M1.682,3.375A1.682,1.682,0,1,0,3.364,5.057,1.682,1.682,0,0,0,1.682,3.375Zm0,5.606a1.682,1.682,0,1,0,1.682,1.682A1.682,1.682,0,0,0,1.682,8.981Zm0,5.606a1.682,1.682,0,1,0,1.682,1.682,1.682,1.682,0,0,0-1.682-1.682Zm15.7.561H6.167a.561.561,0,0,0-.561.561V16.83a.561.561,0,0,0,.561.561H17.379a.561.561,0,0,0,.561-.561V15.709A.561.561,0,0,0,17.379,15.148Zm0-11.212H6.167a.561.561,0,0,0-.561.561V5.617a.561.561,0,0,0,.561.561H17.379a.561.561,0,0,0,.561-.561V4.5A.561.561,0,0,0,17.379,3.936Zm0,5.606H6.167a.561.561,0,0,0-.561.561v1.121a.561.561,0,0,0,.561.561H17.379a.561.561,0,0,0,.561-.561V10.1A.561.561,0,0,0,17.379,9.542Z" transform="translate(0 -3.375)"/>
          </svg>
          <p class="group-hover:text-yellow hidden md:block">Indløste rewards</p>
        </Link>
        <Link href="/admin/users" class="text-xl pb-12 inline-flex items-center group" :class="{'text-yellow': $page.component.startsWith('Admin/Users') }">
          <svg class="fill-white group-hover:fill-yellow md:mr-3 min-w-max" :class="{'fill-yellow': $page.component.startsWith('Admin/Users') }" xmlns="http://www.w3.org/2000/svg" width="24.02" height="17.062" viewBox="0 0 24.02 17.062">
            <title>User icon</title>
            <path id="Icon_awesome-user-friends" data-name="Icon awesome-user-friends" d="M7.206,10.781a4.233,4.233,0,0,0,4.2-4.266A4.2,4.2,0,1,0,3,6.516,4.233,4.233,0,0,0,7.206,10.781ZM10.088,12H9.777a5.728,5.728,0,0,1-5.142,0H4.324A4.357,4.357,0,0,0,0,16.387v1.1a1.815,1.815,0,0,0,1.8,1.828H12.61a1.815,1.815,0,0,0,1.8-1.828v-1.1A4.357,4.357,0,0,0,10.088,12Zm7.926-1.219a3.657,3.657,0,1,0-3.6-3.656A3.631,3.631,0,0,0,18.015,10.781ZM19.816,12h-.143a4.668,4.668,0,0,1-3.318,0h-.143a4.123,4.123,0,0,0-2.09.587,5.618,5.618,0,0,1,1.49,3.8V17.85c0,.084-.019.164-.023.244h6.628a1.815,1.815,0,0,0,1.8-1.828A4.233,4.233,0,0,0,19.816,12Z" transform="translate(0 -2.25)"/>
          </svg>
          <p class="group-hover:text-yellow hidden md:block">Brugere</p>
        </Link>
      </div>

      <!-- User sidebar -->
      <div v-else class="h-[calc(100vh-10rem)] md:h-[calc(100vh-12rem)] sticky top-40 flex flex-col items-center md:items-start border-r py-8 pr-6 pl-2 md:pr-10 md:pl-4 md:min-w-max">
        <Link href="profile" class="text-xl pb-12 inline-flex items-center group" :class="{'text-yellow': $page.component.startsWith('Profile') }">
          <svg class="fill-white group-hover:fill-yellow md:mr-3 min-w-max" :class="{'fill-yellow': $page.component.startsWith('Profile') }" xmlns="http://www.w3.org/2000/svg" width="17.94" height="17.94" viewBox="0 0 17.94 17.94">
            <title>User icon</title>
            <path id="Icon_awesome-user-alt" data-name="Icon awesome-user-alt" d="M8.97,10.091A5.046,5.046,0,1,0,3.924,5.046,5.047,5.047,0,0,0,8.97,10.091Zm4.485,1.121H11.524a6.1,6.1,0,0,1-5.109,0H4.485A4.485,4.485,0,0,0,0,15.7v.561A1.682,1.682,0,0,0,1.682,17.94H16.258a1.682,1.682,0,0,0,1.682-1.682V15.7A4.485,4.485,0,0,0,13.455,11.212Z"/>
          </svg>
          <p class="group-hover:text-yellow hidden md:block">Profil</p>
        </Link>
        <Link href="redeemed" class="text-xl pb-12 inline-flex items-center group" :class="{'text-yellow': $page.component.startsWith('Redeemed') }">
          <svg class="fill-white group-hover:fill-yellow md:mr-3 min-w-max" :class="{'fill-yellow': $page.component.startsWith('Redeemed') }" xmlns="http://www.w3.org/2000/svg" width="19.5" height="17.063" viewBox="0 0 19.5 17.063">
            <title>Gift icon</title>
            <path id="Icon_awesome-gift" data-name="Icon awesome-gift" d="M1.219,18.094a1.217,1.217,0,0,0,1.219,1.219H8.531V13.219H1.219Zm9.75,1.219h6.094a1.217,1.217,0,0,0,1.219-1.219V13.219H10.969ZM18.281,7.125h-1.6A3.321,3.321,0,0,0,17.062,5.6,3.357,3.357,0,0,0,13.711,2.25c-1.584,0-2.609.811-3.923,2.6-1.314-1.79-2.338-2.6-3.923-2.6A3.357,3.357,0,0,0,2.514,5.6,3.274,3.274,0,0,0,2.9,7.125H1.219A1.217,1.217,0,0,0,0,8.344v3.047A.611.611,0,0,0,.609,12H18.891a.611.611,0,0,0,.609-.609V8.344A1.217,1.217,0,0,0,18.281,7.125Zm-12.42,0a1.523,1.523,0,0,1,0-3.047c.758,0,1.318.126,3.279,3.047H5.861Zm7.85,0H10.432c1.958-2.914,2.5-3.047,3.279-3.047a1.523,1.523,0,0,1,0,3.047Z" transform="translate(0 -2.25)"/>
          </svg>
          <p class="group-hover:text-yellow hidden md:block">Indløste rewards</p>
        </Link>
        <Link href="settings" class="text-xl pb-12 inline-flex items-center group" :class="{'text-yellow': $page.component.startsWith('Settings') }">
          <svg class="fill-white group-hover:fill-yellow md:mr-3 min-w-max" :class="{'fill-yellow': $page.component.startsWith('Settings') }" xmlns="http://www.w3.org/2000/svg" width="17.94" height="17.939" viewBox="0 0 17.94 17.939">
            <title>Settings icon</title>
            <path id="Icon_ionic-md-settings" data-name="Icon ionic-md-settings" d="M19.157,13.242a5.609,5.609,0,0,0,.046-.9c0-.314-.046-.583-.046-.9l1.926-1.48a.412.412,0,0,0,.092-.583L19.34,6.29a.447.447,0,0,0-.551-.18l-2.294.9a6.676,6.676,0,0,0-1.559-.9l-.321-2.377a.492.492,0,0,0-.459-.359h-3.67a.492.492,0,0,0-.459.359L9.661,6.111a7.768,7.768,0,0,0-1.56.9l-2.294-.9a.43.43,0,0,0-.551.18L3.422,9.385a.542.542,0,0,0,.092.583l1.973,1.48c0,.314-.046.583-.046.9s.046.583.046.9L3.56,14.722a.412.412,0,0,0-.092.583L5.3,18.4a.447.447,0,0,0,.551.18l2.294-.9a6.675,6.675,0,0,0,1.559.9l.367,2.377a.445.445,0,0,0,.459.359H14.2a.492.492,0,0,0,.459-.359l.367-2.377a7.763,7.763,0,0,0,1.559-.9l2.294.9a.43.43,0,0,0,.551-.18L21.267,15.3a.541.541,0,0,0-.092-.583Zm-6.835,2.242a3.14,3.14,0,1,1,3.211-3.139A3.156,3.156,0,0,1,12.322,15.484Z" transform="translate(-3.375 -3.375)"/>
          </svg>
          <p class="group-hover:text-yellow hidden md:block">Indstillinger</p>
        </Link>
      </div>
  </template>
  
  <script>
  import { Link } from '@inertiajs/vue3';
  
  export default {
    components: {
        Link,
    },
  };
  </script>