const apiURL = "https://gitlab.com/api/v4/users/afetzer/projects?order_by=last_activity_at";
var md = new Remarkable();

$(document).ready(function() {
    $.getJSON(apiURL, function(result) {
        $.each(result, function(i, field) {
            let project = $("#gitlab-template").clone();
            let projectHtml = $(project).html();
            
            //Replace the content
            projectHtml = projectHtml.replace("Project Name", field["name"]);
            projectHtml = projectHtml.replace("Project Description", md.render(field["description"]));
            projectHtml = projectHtml.replace("Project URL", field["http_url_to_repo"]);
            $(project).html(projectHtml);


            //Add the project to DOM
            $(project).appendTo("#projects")
        });
        $("#gitlab-template").remove();
    });
})