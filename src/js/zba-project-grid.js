(($)=>{ $(window).load(()=>{

  $('.single-type-button').click(async function(){
    $('.single-type-button.active').removeClass('active');
    $(this).addClass('active');
    let projectTypeId = $(this).data('project-type');
    $('.project-grid-wrapper').html('');
    $('.loader-wrapper').addClass('loading');
    const projects = await getProjects(projectTypeId);
    let html = buildProjectResults(projects);
    $('.project-grid-wrapper').html(html).show();
    $('.loader-wrapper.loading').removeClass('loading');
  });

})})(jQuery)

async function getProjects(projectTypeId=''){
  const baseUrl = location.origin + `/wp-json/wp/v2/project`;
  const query = (projectTypeId != "-1") ? `?_embed&project_type=${projectTypeId}&per_page=100` : "?_embed&per_page=100";
  const options = {
    headers: {
      "Content-Type": 'application/json'
    }
  }
  return await fetch(baseUrl + query, options)
    .then(response => response.json())
    .then(data => {
      return data;
    }
  );
}

function buildProjectResults(projects){
  shuffle(projects);
  let html = "";
  for (const project of projects){
    let projectTitle = project.title.rendered;
    let projectUrl = project.link;
    let backgroundImage = project._embedded['wp:featuredmedia'][0].media_details.sizes.large.source_url;
    html += `
      <a href="${projectUrl}" class="project" alt="View ${projectTitle}" style="background-image: url(${backgroundImage})">
        <div class="hover-overlay" style="opacity: 0">
          <div class="hover-color"></div>
          <span>${projectTitle}</span>
        </div>
      </a>
    `;
  }
  return html;
}

function shuffle(array) {
  let currentIndex = array.length, randomIndex;
  while (currentIndex > 0) {
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex--;
    [array[currentIndex], array[randomIndex]] = [
      array[randomIndex], array[currentIndex]];
  }
  return array;
}