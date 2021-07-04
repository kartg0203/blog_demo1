 <div class="list-group text-center">
     <a href="{{ route('user.info') }}" class="list-group-item list-group-item-action @if ($nav==='info' ) active @endif" aria-current="true">
         個人信息
     </a>
     <a href="{{ route('user.avatar') }}" class="list-group-item list-group-item-action @if ($nav==='avatar' ) active @endif">修改頭像</a>
     <a href="{{ route('user.blog') }}" class="list-group-item list-group-item-action @if ($nav==='blog' ) active @endif">所有文章</a>
 </div>
