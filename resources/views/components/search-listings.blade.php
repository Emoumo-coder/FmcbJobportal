@props(['class_attr' => 'search-form-btn'])

<div {{ $attributes->merge(['class' => 'pxp-hero-form pxp-hero-form-round pxp-large']) }}>
    <form class="row gx-3 align-items-center search-form">
        <div class="col-12 col-lg">
            <div class="input-group mb-3 mb-lg-0">
                <span class="input-group-text"><span class="fa fa-search"></span></span>
                <input type="text" id="search-query" class="form-control" placeholder="Job Title or Keyword">
            </div>
        </div>
       
        <div class="col-12 col-lg pxp-has-left-border">
            <div class="input-group mb-3 mb-lg-0">
                <span class="input-group-text"><span class="fa fa-folder-o"></span></span>
                <select class="form-select" id="department-select">
                    <option selected value="">All categories</option>
                    <option value="Business Development">Business Development</option>
                    <option value="Construction">Construction</option>
                    <option value="Customer Service">Customer Service</option>
                    <option value="Finance">Finance</option>
                    <option value="Healthcare">Healthcare</option>
                    <option value="Human Resources">Human Resources</option>
                    <option value="Marketing & Communication">Marketing & Communication</option>
                    <option value="Project Management">Project Management</option>
                    <option value="Software Engineering">Software Engineering</option>
                </select>
            </div>
        </div>
        <div class="col-12 col-lg-auto">
            <button class="{{ $class_attr }}">Find Jobs</button>
        </div>
    </form>
</div>