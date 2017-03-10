select avg(la) from statistic where `date`>='2017-01-15' and `date`<='2017-01-20'


select substring_index(time, ':', 1), avg(la) from statistic
group by substring_index(time, ':', 1)