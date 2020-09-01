<?php

namespace App\Controller;

use App\model\PostList;
use App\Entity\Article;
use http\Exception\InvalidArgumentException;

class PostsController
{
    /**
     * @param $id
     * @throws \Exception if Article is invalid
     */

    public static function show($id)
    {
        $article = PostList::retrieveSinglePost($id);
        $comments = PostList::retrieveCommentList($id); ?>
            <div class="container my-5">
                <div class="span8">
                    <h1><?php echo $article->getTitle()?></h1>
                    <p><?php echo $article->getContent()?></p>
                    <h2 class="text-right"><?php echo $article->getNote()?></h2>
                    <div>
                        <div class="tags">
                            <span class="btn-info"><a href="#"><?php echo $article->getCategory()?></a></span>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <hr>
                </div>
                    <?php
                        foreach ($comments as $row => $innerArray) {
                            ?>
                            <div>
                                <h4><?php echo $innerArray['fullname']?></h4>
                                <p><?php echo $innerArray['com_content']?></p>
                            </div>
                            <?php
                        } ?>
             </div>
        <?php
    }

    public function showPostList()
    {
        $articles = PostList::retrievePostList();
//        echo '<pre>';
//        print_r($articles);
//        echo '<pre>';

        foreach ($articles as $row => $innerArray) {
            ?>
            <div class="container my-5">
                <div class="span8">
                    <h1 class="mb-5"><a href="/OnlineAdvisor/post/<?php echo $innerArray['art_ID']; ?>"><?php echo $innerArray['art_name']?></a></h1>
                    <p><?php echo $innerArray['art_content']?></p>
                    <h2 class="text-right"><?php echo $innerArray['art_note']?></h2>
                    <div>
                        <div class="tags">
                            <span class="btn-info"><a href="#"><?php echo $innerArray['art_category']?></a></span>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <hr>
                </div>
            </div>
            <?php
        }
    }
}
