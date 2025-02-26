<section class="message message--alt message--with-icon<% if $Type %> $Type.LowerCase<% end_if %>">
    <header class="message__header">
        <span class="message__icon">
            <% include BaseIcons Icon=$Type %>
        </span>
        <% if $Title %>
            <h1 class="message__title">
                $Title
            </h1>
        <% end_if %>
    </header>
    <% if $Content %>
        <div class="message__content">
            <div class="typo">
                $Content
            </div>
        </div>
    <% end_if %>
</section>
