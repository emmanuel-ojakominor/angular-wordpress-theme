import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { PostListComponent } from './components/post-list/post-list.component';
import { PostSingleComponent } from './components/post-single/post-single.component';
import { PageComponent } from './components/page/page.component';

const routes: Routes = [
  {
    path: '',
    component: PostListComponent
  },
  {
    path: 'posts/:id',   // because we're using a colon, 'id' will act like a variable for our component.
    component: PostSingleComponent
  },
  {
    path: 'page/:id',   // because we're using a colon, 'id' will act like a variable for our component.
    component: PageComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
