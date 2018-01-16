

// output html to dom navbarborder fixed-top

class Template {

	loadPackagesTemplate(data) {
		var output = '<div class="package-container"><a href="/adventure/'+data.id+'"><div class="package">';
			output += '<div class="card card-inverse"><span class="difficulty text-center">'+data.difficulty+'</span>';
			output += '<img class="card-img" src="'+data.thumb_img+'">';
			output += '<div class="card-img-overlay"><h4 class="card-title">';
			output += data.name +'<span>₱'+data.price;
			output += '</span></h4><small>'+data.location+'</small></div></div></div></a></div>';

			return output;
	}

	putComment(comment,user)
	{
		var output = '<div class="comment-wrapper animated fadeIn"><div class="commentor">';
			output += ' <img src="/img/da.jpg">';
			output += '<div class="review-s1">';
			output += '<h3 style="">'+user+'</h3></div>';
			output += '</div><div class="comment">';
			output += comment;
			output += '</div></div>';
			return output;
	}

	mapContent()
	{
		
	    var mcontent = '<div class="map-content">';
	    mcontent += '<img src="/storage/cover_images/'+p.thumb_img+'">';
	    mcontent += '<h3 class="c-header">'+p.name+'</h3>'
	    mcontent += '<h3 class="c-price">$'+p.price+' per person</h3>'
	    mcontent += '<span class="c-rate"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="rev">41 review(s)</i></span>'
	    mcontent += '</div>';
	}
}