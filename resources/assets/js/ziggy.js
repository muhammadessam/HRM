    var Ziggy = {
        namedRoutes: {"coming.leaving":{"uri":"coming\/leaving","methods":["GET","HEAD"],"domain":null},"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"auth.login":{"uri":"login","methods":["POST"],"domain":null},"auth.logout":{"uri":"logout","methods":["POST"],"domain":null},"auth.change_password":{"uri":"change_password","methods":["PATCH"],"domain":null},"auth.password.reset":{"uri":"password\/reset","methods":["POST"],"domain":null},"password.reset":{"uri":"password\/reset\/{token}","methods":["GET","HEAD"],"domain":null},"admin.create.barecode":{"uri":"admin\/staff\/create\/barecode","methods":["GET","HEAD"],"domain":null},"admin.create.maps":{"uri":"admin\/staff\/create\/maps","methods":["GET","HEAD"],"domain":null},"admin.leaving_coming_staff":{"uri":"admin\/staff\/leaving\/coming","methods":["GET","HEAD"],"domain":null},"admin.leaving_coming_staff_show":{"uri":"admin\/staff\/leaving\/coming\/show","methods":["GET","HEAD"],"domain":null},"admin.getMoves":{"uri":"admin\/staff\/leavingComing","methods":["GET","HEAD"],"domain":null},"admin.deleteMoves":{"uri":"admin\/staff\/deleteLeavingComing","methods":["POST"],"domain":null},"admin.":{"uri":"admin\/position\/store","methods":["POST"],"domain":null},"admin.roles.index":{"uri":"admin\/roles","methods":["GET","HEAD"],"domain":null},"admin.roles.create":{"uri":"admin\/roles\/create","methods":["GET","HEAD"],"domain":null},"admin.roles.store":{"uri":"admin\/roles","methods":["POST"],"domain":null},"admin.roles.show":{"uri":"admin\/roles\/{role}","methods":["GET","HEAD"],"domain":null},"admin.roles.edit":{"uri":"admin\/roles\/{role}\/edit","methods":["GET","HEAD"],"domain":null},"admin.roles.update":{"uri":"admin\/roles\/{role}","methods":["PUT","PATCH"],"domain":null},"admin.roles.destroy":{"uri":"admin\/roles\/{role}","methods":["DELETE"],"domain":null},"admin.roles.mass_destroy":{"uri":"admin\/roles_mass_destroy","methods":["POST"],"domain":null},"admin.users.index":{"uri":"admin\/users","methods":["GET","HEAD"],"domain":null},"admin.users.create":{"uri":"admin\/users\/create","methods":["GET","HEAD"],"domain":null},"admin.users.store":{"uri":"admin\/users","methods":["POST"],"domain":null},"admin.users.show":{"uri":"admin\/users\/{user}","methods":["GET","HEAD"],"domain":null},"admin.users.edit":{"uri":"admin\/users\/{user}\/edit","methods":["GET","HEAD"],"domain":null},"admin.users.update":{"uri":"admin\/users\/{user}","methods":["PUT","PATCH"],"domain":null},"admin.users.destroy":{"uri":"admin\/users\/{user}","methods":["DELETE"],"domain":null},"admin.users.mass_destroy":{"uri":"admin\/users_mass_destroy","methods":["POST"],"domain":null},"admin.vacations.index":{"uri":"admin\/vacations","methods":["GET","HEAD"],"domain":null},"admin.vacations.create":{"uri":"admin\/vacations\/create","methods":["GET","HEAD"],"domain":null},"admin.vacations.store":{"uri":"admin\/vacations","methods":["POST"],"domain":null},"admin.vacations.show":{"uri":"admin\/vacations\/{vacation}","methods":["GET","HEAD"],"domain":null},"admin.vacations.edit":{"uri":"admin\/vacations\/{vacation}\/edit","methods":["GET","HEAD"],"domain":null},"admin.vacations.update":{"uri":"admin\/vacations\/{vacation}","methods":["PUT","PATCH"],"domain":null},"admin.vacations.destroy":{"uri":"admin\/vacations\/{vacation}","methods":["DELETE"],"domain":null},"admin.vacations.mass_destroy":{"uri":"admin\/vacations_mass_destroy","methods":["POST"],"domain":null},"admin.vacations.restore":{"uri":"admin\/vacations_restore\/{id}","methods":["POST"],"domain":null},"admin.vacations.perma_del":{"uri":"admin\/vacations_perma_del\/{id}","methods":["DELETE"],"domain":null},"admin.working_periods.index":{"uri":"admin\/working_periods","methods":["GET","HEAD"],"domain":null},"admin.working_periods.create":{"uri":"admin\/working_periods\/create","methods":["GET","HEAD"],"domain":null},"admin.working_periods.store":{"uri":"admin\/working_periods","methods":["POST"],"domain":null},"admin.working_periods.show":{"uri":"admin\/working_periods\/{working_period}","methods":["GET","HEAD"],"domain":null},"admin.working_periods.edit":{"uri":"admin\/working_periods\/{working_period}\/edit","methods":["GET","HEAD"],"domain":null},"admin.working_periods.update":{"uri":"admin\/working_periods\/{working_period}","methods":["PUT","PATCH"],"domain":null},"admin.working_periods.destroy":{"uri":"admin\/working_periods\/{working_period}","methods":["DELETE"],"domain":null},"admin.working_periods.mass_destroy":{"uri":"admin\/working_periods_mass_destroy","methods":["POST"],"domain":null},"admin.working_periods.restore":{"uri":"admin\/working_periods_restore\/{id}","methods":["POST"],"domain":null},"admin.working_periods.perma_del":{"uri":"admin\/working_periods_perma_del\/{id}","methods":["DELETE"],"domain":null},"admin.assign_working_periods.index":{"uri":"admin\/assign_working_periods","methods":["GET","HEAD"],"domain":null},"admin.assign_working_periods.create":{"uri":"admin\/assign_working_periods\/create","methods":["GET","HEAD"],"domain":null},"admin.assign_working_periods.store":{"uri":"admin\/assign_working_periods","methods":["POST"],"domain":null},"admin.assign_working_periods.show":{"uri":"admin\/assign_working_periods\/{assign_working_period}","methods":["GET","HEAD"],"domain":null},"admin.assign_working_periods.edit":{"uri":"admin\/assign_working_periods\/{assign_working_period}\/edit","methods":["GET","HEAD"],"domain":null},"admin.assign_working_periods.update":{"uri":"admin\/assign_working_periods\/{assign_working_period}","methods":["PUT","PATCH"],"domain":null},"admin.assign_working_periods.destroy":{"uri":"admin\/assign_working_periods\/{assign_working_period}","methods":["DELETE"],"domain":null},"admin.assign_working_periods.mass_destroy":{"uri":"admin\/assign_working_period_mass_destroy","methods":["POST"],"domain":null},"admin.assign_deps_working_periods.index":{"uri":"admin\/assign_deps_working_periods","methods":["GET","HEAD"],"domain":null},"admin.assign_deps_working_periods.create":{"uri":"admin\/assign_deps_working_periods\/create","methods":["GET","HEAD"],"domain":null},"admin.assign_deps_working_periods.store":{"uri":"admin\/assign_deps_working_periods","methods":["POST"],"domain":null},"admin.assign_deps_working_periods.show":{"uri":"admin\/assign_deps_working_periods\/{assign_deps_working_period}","methods":["GET","HEAD"],"domain":null},"admin.assign_deps_working_periods.edit":{"uri":"admin\/assign_deps_working_periods\/{assign_deps_working_period}\/edit","methods":["GET","HEAD"],"domain":null},"admin.assign_deps_working_periods.update":{"uri":"admin\/assign_deps_working_periods\/{assign_deps_working_period}","methods":["PUT","PATCH"],"domain":null},"admin.assign_deps_working_periods.destroy":{"uri":"admin\/assign_deps_working_periods\/{assign_deps_working_period}","methods":["DELETE"],"domain":null},"admin.assign_departments_working_periods.mass_destroy":{"uri":"admin\/assign_deps_working_period_mass_destroy","methods":["POST"],"domain":null},"admin.specialties.index":{"uri":"admin\/specialties","methods":["GET","HEAD"],"domain":null},"admin.specialties.create":{"uri":"admin\/specialties\/create","methods":["GET","HEAD"],"domain":null},"admin.specialties.store":{"uri":"admin\/specialties","methods":["POST"],"domain":null},"admin.specialties.show":{"uri":"admin\/specialties\/{specialty}","methods":["GET","HEAD"],"domain":null},"admin.specialties.edit":{"uri":"admin\/specialties\/{specialty}\/edit","methods":["GET","HEAD"],"domain":null},"admin.specialties.update":{"uri":"admin\/specialties\/{specialty}","methods":["PUT","PATCH"],"domain":null},"admin.specialties.destroy":{"uri":"admin\/specialties\/{specialty}","methods":["DELETE"],"domain":null},"admin.specialties.mass_destroy":{"uri":"admin\/specialties_mass_destroy","methods":["POST"],"domain":null},"admin.specialties.restore":{"uri":"admin\/specialties_restore\/{id}","methods":["POST"],"domain":null},"admin.specialties.perma_del":{"uri":"admin\/specialties_perma_del\/{id}","methods":["DELETE"],"domain":null},"admin.departments.index":{"uri":"admin\/departments","methods":["GET","HEAD"],"domain":null},"admin.departments.create":{"uri":"admin\/departments\/create","methods":["GET","HEAD"],"domain":null},"admin.departments.store":{"uri":"admin\/departments","methods":["POST"],"domain":null},"admin.departments.show":{"uri":"admin\/departments\/{department}","methods":["GET","HEAD"],"domain":null},"admin.departments.edit":{"uri":"admin\/departments\/{department}\/edit","methods":["GET","HEAD"],"domain":null},"admin.departments.update":{"uri":"admin\/departments\/{department}","methods":["PUT","PATCH"],"domain":null},"admin.departments.destroy":{"uri":"admin\/departments\/{department}","methods":["DELETE"],"domain":null},"admin.departments.mass_destroy":{"uri":"admin\/departments_mass_destroy","methods":["POST"],"domain":null},"admin.departments.restore":{"uri":"admin\/departments_restore\/{id}","methods":["POST"],"domain":null},"admin.departments.perma_del":{"uri":"admin\/departments_perma_del\/{id}","methods":["DELETE"],"domain":null},"admin.degrees.index":{"uri":"admin\/degrees","methods":["GET","HEAD"],"domain":null},"admin.degrees.create":{"uri":"admin\/degrees\/create","methods":["GET","HEAD"],"domain":null},"admin.degrees.store":{"uri":"admin\/degrees","methods":["POST"],"domain":null},"admin.degrees.show":{"uri":"admin\/degrees\/{degree}","methods":["GET","HEAD"],"domain":null},"admin.degrees.edit":{"uri":"admin\/degrees\/{degree}\/edit","methods":["GET","HEAD"],"domain":null},"admin.degrees.update":{"uri":"admin\/degrees\/{degree}","methods":["PUT","PATCH"],"domain":null},"admin.degrees.destroy":{"uri":"admin\/degrees\/{degree}","methods":["DELETE"],"domain":null},"admin.degrees.mass_destroy":{"uri":"admin\/degrees_mass_destroy","methods":["POST"],"domain":null},"admin.degrees.restore":{"uri":"admin\/degrees_restore\/{id}","methods":["POST"],"domain":null},"admin.degrees.perma_del":{"uri":"admin\/degrees_perma_del\/{id}","methods":["DELETE"],"domain":null},"admin.courses.index":{"uri":"admin\/courses","methods":["GET","HEAD"],"domain":null},"admin.courses.create":{"uri":"admin\/courses\/create","methods":["GET","HEAD"],"domain":null},"admin.courses.store":{"uri":"admin\/courses","methods":["POST"],"domain":null},"admin.courses.show":{"uri":"admin\/courses\/{course}","methods":["GET","HEAD"],"domain":null},"admin.courses.edit":{"uri":"admin\/courses\/{course}\/edit","methods":["GET","HEAD"],"domain":null},"admin.courses.update":{"uri":"admin\/courses\/{course}","methods":["PUT","PATCH"],"domain":null},"admin.courses.destroy":{"uri":"admin\/courses\/{course}","methods":["DELETE"],"domain":null},"admin.courses.mass_destroy":{"uri":"admin\/courses_mass_destroy","methods":["POST"],"domain":null},"admin.courses.restore":{"uri":"admin\/courses_restore\/{id}","methods":["POST"],"domain":null},"admin.courses.perma_del":{"uri":"admin\/courses_perma_del\/{id}","methods":["DELETE"],"domain":null},"admin.experiences.index":{"uri":"admin\/experiences","methods":["GET","HEAD"],"domain":null},"admin.experiences.create":{"uri":"admin\/experiences\/create","methods":["GET","HEAD"],"domain":null},"admin.experiences.store":{"uri":"admin\/experiences","methods":["POST"],"domain":null},"admin.experiences.show":{"uri":"admin\/experiences\/{experience}","methods":["GET","HEAD"],"domain":null},"admin.experiences.edit":{"uri":"admin\/experiences\/{experience}\/edit","methods":["GET","HEAD"],"domain":null},"admin.experiences.update":{"uri":"admin\/experiences\/{experience}","methods":["PUT","PATCH"],"domain":null},"admin.experiences.destroy":{"uri":"admin\/experiences\/{experience}","methods":["DELETE"],"domain":null},"admin.experiences.mass_destroy":{"uri":"admin\/experiences_mass_destroy","methods":["POST"],"domain":null},"admin.experiences.restore":{"uri":"admin\/experiences_restore\/{id}","methods":["POST"],"domain":null},"admin.experiences.perma_del":{"uri":"admin\/experiences_perma_del\/{id}","methods":["DELETE"],"domain":null},"admin.users.usedVacations.index":{"uri":"admin\/users\/{id}\/usedVacations","methods":["GET","HEAD"],"domain":null},"admin.users.usedVacations.create":{"uri":"admin\/users\/{id}\/usedVacations\/create","methods":["GET","HEAD"],"domain":null},"admin.users.usedVacations.store":{"uri":"admin\/users\/{id}\/usedVacations","methods":["POST"],"domain":null},"admin.users.usedVacations.show":{"uri":"admin\/users\/{id}\/usedVacations\/{usedVacation}","methods":["GET","HEAD"],"domain":null},"admin.users.usedVacations.edit":{"uri":"admin\/users\/{id}\/usedVacations\/{usedVacation}\/edit","methods":["GET","HEAD"],"domain":null},"admin.users.usedVacations.update":{"uri":"admin\/users\/{id}\/usedVacations\/{usedVacation}","methods":["PUT","PATCH"],"domain":null},"admin.users.usedVacations.destroy":{"uri":"admin\/users\/{id}\/usedVacations\/{usedVacation}","methods":["DELETE"],"domain":null},"admin.users.usedVacations.mass_destroy":{"uri":"admin\/users\/{id}\/usedVacations_mass_destroy","methods":["POST"],"domain":null},"admin.users.usedVacations.restore":{"uri":"admin\/users\/{id}\/usedVacations_restore\/{vacationId}","methods":["POST"],"domain":null},"admin.users.usedVacations.perma_del":{"uri":"admin\/users\/{id}\/usedVacations_perma_del\/{vacationId}","methods":["DELETE"],"domain":null},"admin.users.pointings.index":{"uri":"admin\/users\/{id}\/pointings","methods":["GET","HEAD"],"domain":null},"admin.pointings.create":{"uri":"admin\/pointings\/create","methods":["GET","HEAD"],"domain":null},"admin.pointings.store":{"uri":"admin\/pointings","methods":["POST"],"domain":null},"admin.pointings.show":{"uri":"admin\/pointings\/{pointing}","methods":["GET","HEAD"],"domain":null},"admin.pointings.edit":{"uri":"admin\/pointings\/{pointing}\/edit","methods":["GET","HEAD"],"domain":null},"admin.pointings.update":{"uri":"admin\/pointings\/{pointing}","methods":["PUT","PATCH"],"domain":null},"admin.pointings.destroy":{"uri":"admin\/pointings\/{pointing}","methods":["DELETE"],"domain":null},"admin.pointing_files.index":{"uri":"admin\/pointing_files","methods":["GET","HEAD"],"domain":null},"admin.pointing_files.create":{"uri":"admin\/pointing_files\/create","methods":["GET","HEAD"],"domain":null},"admin.pointing_files.store":{"uri":"admin\/pointing_files","methods":["POST"],"domain":null},"admin.aids.index":{"uri":"admin\/aids","methods":["GET","HEAD"],"domain":null},"admin.aids.create":{"uri":"admin\/aids\/create","methods":["GET","HEAD"],"domain":null},"admin.aids.store":{"uri":"admin\/aids","methods":["POST"],"domain":null},"admin.aids.show":{"uri":"admin\/aids\/{aid}","methods":["GET","HEAD"],"domain":null},"admin.aids.edit":{"uri":"admin\/aids\/{aid}\/edit","methods":["GET","HEAD"],"domain":null},"admin.aids.update":{"uri":"admin\/aids\/{aid}","methods":["PUT","PATCH"],"domain":null},"admin.aids.destroy":{"uri":"admin\/aids\/{aid}","methods":["DELETE"],"domain":null},"admin.aids.mass_destroy":{"uri":"admin\/aids_mass_destroy","methods":["POST"],"domain":null},"admin.rest_days.index":{"uri":"admin\/rest_days","methods":["GET","HEAD"],"domain":null},"admin.rest_days.create":{"uri":"admin\/rest_days\/create","methods":["GET","HEAD"],"domain":null},"admin.rest_days.store":{"uri":"admin\/rest_days","methods":["POST"],"domain":null},"admin.rest_days.show":{"uri":"admin\/rest_days\/{rest_day}","methods":["GET","HEAD"],"domain":null},"admin.rest_days.edit":{"uri":"admin\/rest_days\/{rest_day}\/edit","methods":["GET","HEAD"],"domain":null},"admin.rest_days.update":{"uri":"admin\/rest_days\/{rest_day}","methods":["PUT","PATCH"],"domain":null},"admin.rest_days.destroy":{"uri":"admin\/rest_days\/{rest_day}","methods":["DELETE"],"domain":null},"admin.rest_days.mass_destroy":{"uri":"admin\/rest_days_mass_destroy","methods":["POST"],"domain":null},"admin.assign_aids.index":{"uri":"admin\/assign_aids","methods":["GET","HEAD"],"domain":null},"admin.assign_aids.create":{"uri":"admin\/assign_aids\/create","methods":["GET","HEAD"],"domain":null},"admin.assign_aids.store":{"uri":"admin\/assign_aids","methods":["POST"],"domain":null},"admin.assign_aids.show":{"uri":"admin\/assign_aids\/{assign_aid}","methods":["GET","HEAD"],"domain":null},"admin.assign_aids.edit":{"uri":"admin\/assign_aids\/{assign_aid}\/edit","methods":["GET","HEAD"],"domain":null},"admin.assign_aids.update":{"uri":"admin\/assign_aids\/{assign_aid}","methods":["PUT","PATCH"],"domain":null},"admin.assign_aids.destroy":{"uri":"admin\/assign_aids\/{assign_aid}","methods":["DELETE"],"domain":null},"admin.assign_aid_deps.index":{"uri":"admin\/assign_aid_deps","methods":["GET","HEAD"],"domain":null},"admin.assign_aid_deps.create":{"uri":"admin\/assign_aid_deps\/create","methods":["GET","HEAD"],"domain":null},"admin.assign_aid_deps.store":{"uri":"admin\/assign_aid_deps","methods":["POST"],"domain":null},"admin.assign_aid_deps.show":{"uri":"admin\/assign_aid_deps\/{assign_aid_dep}","methods":["GET","HEAD"],"domain":null},"admin.assign_aid_deps.edit":{"uri":"admin\/assign_aid_deps\/{assign_aid_dep}\/edit","methods":["GET","HEAD"],"domain":null},"admin.assign_aid_deps.update":{"uri":"admin\/assign_aid_deps\/{assign_aid_dep}","methods":["PUT","PATCH"],"domain":null},"admin.assign_aid_deps.destroy":{"uri":"admin\/assign_aid_deps\/{assign_aid_dep}","methods":["DELETE"],"domain":null},"admin.assign_rest_days.index":{"uri":"admin\/assign_rest_days","methods":["GET","HEAD"],"domain":null},"admin.assign_rest_days.create":{"uri":"admin\/assign_rest_days\/create","methods":["GET","HEAD"],"domain":null},"admin.assign_rest_days.store":{"uri":"admin\/assign_rest_days","methods":["POST"],"domain":null},"admin.assign_rest_days.show":{"uri":"admin\/assign_rest_days\/{assign_rest_day}","methods":["GET","HEAD"],"domain":null},"admin.assign_rest_days.edit":{"uri":"admin\/assign_rest_days\/{assign_rest_day}\/edit","methods":["GET","HEAD"],"domain":null},"admin.assign_rest_days.update":{"uri":"admin\/assign_rest_days\/{assign_rest_day}","methods":["PUT","PATCH"],"domain":null},"admin.assign_rest_days.destroy":{"uri":"admin\/assign_rest_days\/{assign_rest_day}","methods":["DELETE"],"domain":null},"admin.assign_dep_rest_days.index":{"uri":"admin\/assign_dep_rest_days","methods":["GET","HEAD"],"domain":null},"admin.assign_dep_rest_days.create":{"uri":"admin\/assign_dep_rest_days\/create","methods":["GET","HEAD"],"domain":null},"admin.assign_dep_rest_days.store":{"uri":"admin\/assign_dep_rest_days","methods":["POST"],"domain":null},"admin.assign_dep_rest_days.show":{"uri":"admin\/assign_dep_rest_days\/{assign_dep_rest_day}","methods":["GET","HEAD"],"domain":null},"admin.assign_dep_rest_days.edit":{"uri":"admin\/assign_dep_rest_days\/{assign_dep_rest_day}\/edit","methods":["GET","HEAD"],"domain":null},"admin.assign_dep_rest_days.update":{"uri":"admin\/assign_dep_rest_days\/{assign_dep_rest_day}","methods":["PUT","PATCH"],"domain":null},"admin.assign_dep_rest_days.destroy":{"uri":"admin\/assign_dep_rest_days\/{assign_dep_rest_day}","methods":["DELETE"],"domain":null},"admin.reports.vacations.index":{"uri":"admin\/reports\/vacations","methods":["GET","HEAD"],"domain":null},"admin.reports.users.index":{"uri":"admin\/reports\/users","methods":["GET","HEAD"],"domain":null},"admin.reports.pointings.index":{"uri":"admin\/reports\/pointings","methods":["GET","HEAD"],"domain":null},"admin.reports.pointings.show":{"uri":"admin\/reports\/pointings\/{id}","methods":["GET","HEAD"],"domain":null}},
        baseUrl: 'http://localhost/',
        baseProtocol: 'http',
        baseDomain: 'localhost',
        basePort: false,
        defaultParameters: []
    };

    if (typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }