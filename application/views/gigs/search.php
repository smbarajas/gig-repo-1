<?php
/**
* search.php displays search results for gigs
*
* views/gigs/search.php
*
* @package ITC 260 Gig Central CodeIgnitor
* @subpackage Gig Controller
* @author Sophia Allen
* @version 1.0 2015/05/25
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Gig_model.php
* @see Gig.php
*/
?>

<?php $this->load->view($this->config->item('theme') . 'header'); ?>


<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li class="active">Gigs</li>
</ul>


<h2><?=$title;?></h2>

<div class="container-fluid">

    <div class="row">

<!-- left column: search form and filter form -->
<div class="col-sm-3 gig-search">
    <!-- gig search field -->
    <form role="search" method="post" action="gig/search">
        <h4>Search by Keyword</h4>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter a Keyword..." name="keyword">
        </div>
        <button type="submit" class="btn small-btn">Search</button>
    </form>

    <!-- gig filter form -->
    <form role="filter" method="post" action="gig/filter">
        <h4>Filter</h4>
        <div class="form-group">
            <label>Type of Job:<br />
                <select name="GigOutline">
                    <?php foreach ($gigs as $gig): ?>
                    <option value="<?=$gig['GigOutline']?>"><?=$gig['GigOutline']?></option>
                    <?php endforeach ?>
                </select>
            </label>
        </div>

        <div class="form-group">
            <label>City:<br />
                <select name="CompanyCity">
                    <?php foreach ($gigs as $gig): ?>
                    <option value="<?=$gig['CompanyCity']?>"><?=$gig['CompanyCity']?></option>
                    <?php endforeach ?>
                </select>
            </label>
        </div>

        <div class="form-group">
            <label>Company Name:<br />
                <select name="Name">
                    <?php foreach ($gigs as $gig): ?>
                    <option value="<?=$gig['Name']?>"><?=$gig['Name']?></option>
                    <?php endforeach ?>
                </select>
            </label>
        </div>

        <button type="submit" class="btn small-btn">Filter</button>

    </form>
</div><!-- .col-sm-6 -->
<!-- END left column: search form and filter form -->

<!-- right column: lists all gigs -->
<div class="col-sm-9 gig-list">
  <?php if ($gigs === null): ?>
  	<h3>Sorry, no results found. Please try again.</h3>
  <?php else: ?>
  	<h3><strong>Results found:</strong></h3>
  	<hr/>
  	<?php foreach ($gigs as $gig): ?>
    <div class="gig-list-item">
    	<h3><?php echo $gig['Name'] ?></h3>
    	<p><?php echo $gig['CompanyCity'] . ", " . $gig['State'] ?></p>
    	<p><?php echo $gig['GigOutline'] ?></p>
    	<p><?php echo anchor('gig/'.$gig['GigID'] , 'Read More');?></p>
    </div>
  	<?php endforeach ?>
  <?php endif ?>
</div>
<!-- END right column: lists all gigs -->

</div><!-- .row -->
</div><!-- .container-fluid -->

<?php $this->load->view($this->config->item('theme') . 'footer'); ?>
