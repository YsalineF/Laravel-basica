$(function() {

  /**
   * Chargement de plus de work lorsqu'on appuie sur le bouton 'more works'
   */
  $('#portfolio_index_more').click(function(e) {
    e.preventDefault();

    let offset = $('#works_list .col-md-4').length;

    $.get($(this).data('url'), {
      offset,
      limit: $(this).data('limit')
    },function(reponse){
      $('#works_list').append(reponse)
                      .find('.col-md-4:nth-last-of-type(-n+'+offset+')')
                      .addClass('col-sm-6');
    });
  });

  /**
   * Permet de load plus de work lorsqu'on scroll sur la page
   * Fonctionnement :
   *    On vérifie si on atteint le bas de la page à l'aide du scroll
   *    et si c'est le cas, on active le click sur le bouton 'more works'
   *    codé ci-dessus
   */
  $(window).scroll(function() {
    if($(window).scrollTop() === $(document).height() - $(window).height()) {
      $('#portfolio_index_more').click();
    }
  });

});
